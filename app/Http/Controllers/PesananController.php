<?php

namespace App\Http\Controllers;

use App\AfterShipAPI;
use App\MidtransAPI;
use App\Notifications\PesananBaru;
use App\Notifications\ProgresPesanan;
use App\Pesanan;
use App\Produk;
use App\RajaOngkirAPI;
use App\StatusPesanan;
use Barryvdh\DomPDF\Facade as PDF;
use Veritrans_Notification;
use Veritrans_Config;
use App\Notifications\Konfirmasi;
use Illuminate\Support\Facades\Request;

class PesananController extends Controller
{
	//verified
	public function index()
	{
		$pesanans = auth()->user()->konfeksi->pesanans;
		return view('admin.pesanans', compact('pesanans'));
	}

	//verified
	public function indexJson()
	{
		$pesanans = auth()->user()->konfeksi->pesanans;
		return response()->json($pesanans->load(['user','pesans']));
	}

	//verified
	public function indexPelanggan()
	{
		$pesanans = auth()->user()->pesanans;
		return view('pesanan', compact('pesanans'));
	}

	public function show($pesananId)
	{
		$pesanan = Pesanan::temukan($pesananId);
		return view('detail-pesanan', compact('pesanan'));	
	}

	public function create($produkId)
	{
		$produk = Produk::temukan($produkId);
		$kotas = RajaOngkirAPI::daftarKota();
		return view('pesan', compact('produk', 'kotas'));
	}

	//verified
	public function store()
	{
		$this->validate(request(), [
			'catatan' => 'required',
			'file_desain' => 'required'
		]);
		$jumlah = [
			'S' => request('small') ?: 0,
			'M' => request('medium') ?: 0,
			'L' => request('large') ?: 0,
			'XL' => request('extra_large') ?: 0
		];
		if (array_sum($jumlah) == 0) {
			return back()->withErrors(['jumlah' => 'jumlah tidak boleh kosong']);
		}
		$path = request('file_desain')->store('pesanan', 'public');
		$pesanan = Pesanan::buat(auth()->user()->id, request('produk_id'), request('catatan'), $path, request('alamat'), request('kota'), $jumlah, request('kurir'));
		$statusPesanan = StatusPesanan::buat($pesanan->id, 'menunggu respon dari konfeksi');
		$pesanan->produk->konfeksi->user->notify(new PesananBaru($pesanan));
		return redirect('/')->with('flash', 'Pesanan berhasil dikirim');
	}

	//verified
	public function updateStatus($pesananId, $keterangan, $nomorResi)
	{
		$pesanan = Pesanan::temukan($pesananId);
		$statusPesanan = StatusPesanan::buat($pesanan->id, $keterangan);
		$pesanan->user->notify(new ProgresPesanan($statusPesanan));
		if ($nomorResi != 'kosong') {
			$pesanan->isiNomorResi($nomorResi);
			AfterShipAPI::addTracking($pesanan->kurir, $nomorResi);
		}
		return back()->with('flash', 'Status Pesanan berhasil disimpan');
	}

	//verified
	public function cetakBukti($kodePesanan)
	{
		$pesanan = Pesanan::filter($kodePesanan);
		$pdf = PDF::loadView('mail.bukti-pemesanan', compact('pesanan'));
		return $pdf->download("Bukti Pesanan #{$pesanan->kode_pesanan}.pdf");
	}

	//verified
	public function pembayaranLunas($kodePesanan)
	{
		$pesanan = Pesanan::filter($kodePesanan);
		$ongkosKirim = RajaOngkirAPI::ongkir($pesanan->produk->konfeksi->kota_id, $pesanan->kota_id, $pesanan->kurir);
		$snapToken = MidtransAPI::tokenPembayaranLunas($pesanan, $ongkosKirim, $pesanan->penawarans()->where('status', 'diterima')->first()->biaya);
		return response()->json(['snap_token' => $snapToken]);	
	}

	public function notificationHandler()
	{
	    Veritrans_Config::$serverKey = env('MIDTRANS_SERVERKEY');
		Veritrans_Config::$isProduction = false;
		Veritrans_Config::$isSanitized = true;
		Veritrans_Config::$is3ds = true;
		$notif = new Veritrans_Notification();
		\DB::transaction(function() use($notif) {
			$transaction = $notif->transaction_status;
			$type = $notif->payment_type;
			$orderId = $notif->order_id;
			$fraud = $notif->fraud_status;
			$kodePesanan = preg_replace("/[^0-9]/", '', $orderId);
			$tipe = preg_replace("/[^a-zA-Z]/", '', $orderId);
			$keterangan = $tipe == 'DP' ? 'DP': 'LUNAS';
			$pesanan = Pesanan::filter($kodePesanan);
			if ($transaction == 'capture') {
				// if ($type == 'credit_card') {
					StatusPesanan::buat($pesanan->id, 'Pembayaran '.$keterangan.' sukses');
					$pesanan->produk->konfeksi->user->notify(new Konfirmasi($pesanan));
				// }
			} elseif ($transaction == 'settlement') {
					StatusPesanan::buat($pesanan->id, 'Pembayaran '.$keterangan.' sukses');
					$pesanan->produk->konfeksi->user->notify(new Konfirmasi($pesanan));
			} elseif($transaction == 'pending'){

			} elseif ($transaction == 'deny') {

			} elseif ($transaction == 'expire') {

			} elseif ($transaction == 'cancel') {

			}
		});
		return;
	}

	//verified
	public function infoEkspedisi($asal, $tujuan)
	{
		$couriers = ['jne', 'tiki', 'pos'];
		$result = [];
		foreach ($couriers as $courier) {
			$cost = RajaOngkirAPI::ongkirEkspedisi($asal, $tujuan, 10, $courier);
			$result = array_merge($result, $cost);
		}
		return response()->json($result, 200);
	}

	// verified
	public function checkpoints($kodePesanan)
	{
		$pesanan = Pesanan::filter($kodePesanan);
		if ($pesanan != null) {
			$response = AfterShipAPI::getCheckpoints($pesanan->kurir, $pesanan->nomor_resi);
			return $response;
		}
		return null;
	}
}
