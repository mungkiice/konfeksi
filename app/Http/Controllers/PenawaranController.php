<?php

namespace App\Http\Controllers;

use App\MidtransAPI;
use App\Notifications\PenawaranBaru;
use App\Penawaran;
use App\Pesanan;
use App\RajaOngkirAPI;
use App\StatusPesanan;
use Illuminate\Http\Request;
use Veritrans_Notification;
use Veritrans_Snap;

class PenawaranController extends Controller
{
    //verified
    public function create($pesananId)
    {
    	$pesanan = Pesanan::temukan($pesananId);
    	return view('admin.penawaran-form', compact('pesanan'));
    }

    //verified
    public function show($kodePesanan)
    {
        $pesanan = Pesanan::filter($kodePesanan);
        $penawarans = $pesanan->penawarans()->latest()->get();
        return view('penawaran', compact('penawarans', 'pesanan'));
    }

    // verified
    public function store($pesananId)
    {
    	$this->validate(request(), [
            'tanggal_selesai' => 'required',
        ]);

        $path = '';
        if (request('gambar') != null) {
            $path = request('gambar')->store('pesanan', 'public');
        }

        $pesanan = Pesanan::temukan($pesananId);
        
        $penawaran = Penawaran::buat($pesanan->id,request('tanggal_selesai'),request('biaya'),request('catatan'),$path);
        $statusPesanan = StatusPesanan::buat($pesanan->id, 'menunggu konfirmasi penawaran');
        $pesanan->user->notify(new PenawaranBaru($penawaran));
        return redirect('/konfeksi')->with('flash', 'Penawaran berhasil dikirim');
    }

    //verified
    public function konfirmasi($penawaranId)
    {
        $penawaran = Penawaran::temukan($penawaranId);
        $penawaran->perbarui(request('status'));
        $pesanan = Pesanan::temukan($penawaran->pesanan_id);
        $ongkosKirim = RajaOngkirAPI::ongkir($pesanan->produk->konfeksi->kota_id, $pesanan->kota_id, $pesanan->kurir);
        $totalBiaya = $penawaran->biaya + $ongkosKirim;
        if (request('status') == 'diterima') {
            $statusPesanan = StatusPesanan::buat($pesanan->id, 'menunggu pembayaran DP');
            $snapToken = MidtransAPI::tokenPembayaranUangMuka($pesanan, $ongkosKirim, $penawaran->biaya);
            $pesanan->perbarui($totalBiaya, $penawaran->tanggal_selesai, $penawaran->catatan, $snapToken);
            return response()->json([
                'snap_token' => $snapToken,
                'flash' => 'Penawaran berhasil disetujui'
            ]);
        }
        return response()->json([
            'flash' => 'Penawaran berhasil ditolak'
        ]);;
    }}