<?php

namespace App\Http\Controllers;

use App\AfterShipAPI;
use App\Notifications\PesananBaru;
use App\Notifications\ProgresPesanan;
use App\Pesanan;
use App\Produk;
use App\RajaOngkirAPI;
use App\StatusPesanan;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class PesananController extends Controller
{
	public function index()
	{
		$pesanans = auth()->user()->konfeksi->pesanans;
		return view('admin.pesanans', compact('pesanans'));
	}

	public function indexMember()
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
		$kotas = RajaOngkirAPI::getCities();
		return view('pesan', compact('produk', 'kotas'));
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'catatan' => 'required',
			'file_desain' => 'required'
		]);
		$path = $request->file_desain->store('pesanan', 'public');
		$jumlah = [
			'S' => $request->small ?: 0,
			'M' => $request->medium ?: 0,
			'L' => $request->large ?: 0,
			'XL' => $request->extra_large ?: 0
		];
		$pesanan = Pesanan::buat(auth()->user()->id, $request->produk_id, $request->tanggal_selesai, $request->catatan, $path, $request->alamat, $request->kota, $jumlah, $request->kurir);
		$statusPesanan = StatusPesanan::buat($pesanan->id, 'menunggu respon dari konfeksi');
		$pesanan->produk->konfeksi->user->notify(new PesananBaru($pesanan));
		return redirect('/')->with('flash', 'Pesanan berhasil dikirim');
	}

	public function updateStatus(Request $request, $pesananId)
	{
		$pesanan = Pesanan::temukan($pesananId);
		$this->validate($request, [
			'keterangan' => 'required'
		]);

		$statusPesanan = StatusPesanan::buat($pesanan->id, $request->keterangan);
		$pesanan->user->notify(new ProgresPesanan($statusPesanan));
		if ($request->nomor_resi != null) {
			$pesanan->isiNomorResi($request->nomor_resi);
			AfterShipAPI::addTracking($pesanan->kurir, $request->nomor_resi);
		}
		return back()->with('flash', 'Status Pesanan berhasil disimpan');
	}

	public function cetakBukti($kodePesanan)
	{
		$pesanan = Pesanan::filter($kodePesanan);
		$pdf = PDF::loadView('mail.bukti-pemesanan', compact('pesanan'));
		return $pdf->download("Bukti Pesanan #{$pesanan->kode_pesanan}.pdf");
	}
}
