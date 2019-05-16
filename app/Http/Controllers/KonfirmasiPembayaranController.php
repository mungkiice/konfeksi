<?php

namespace App\Http\Controllers;

use App\KonfirmasiPembayaran;
use App\Notifications\Konfirmasi;
use App\Pesanan;
use Illuminate\Http\Request;

class KonfirmasiPembayaranController extends Controller
{
    public function create($pesananId)
    {
        $pesanan = Pesanan::temukan($pesananId);
        return view('konfirmasi-pembayaran', compact('pesanan'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'gambar' => 'required'
    	]);
        $path = $request->gambar->store('pembayaran', 'public');
        $pesanan = Pesanan::filter($request->kode_pesanan)->first();
        $konfirmasiPembayaran = KonfirmasiPembayaran::buat($pesanan->id, $path);
        $pesanan->produk->konfeksi->user->notify(new Konfirmasi($konfirmasiPembayaran));
        return redirect('/')->with('flash', 'Konfirmasi Pembayaran berhasil disimpan');
    }
}
