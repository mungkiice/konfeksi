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
        $pesanan = Pesanan::find($pesananId);
    	return view('konfirmasi-pembayaran', compact('pesanan'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'kode_pesanan' => 'required|exists:pesanans,kode_pesanan',
    		'gambar' => 'required|image|mimes:png,jpg,jpeg'
    	]);
    	if ($request->hasFile('gambar')) {
    		$path = $request->gambar->store('pembayaran', 'public');
    	}
    	$pesanan = Pesanan::where('kode_pesanan', $request->kode_pesanan)->first();
    	$konfirmasiPembayaran = KonfirmasiPembayaran::create([
    		'pesanan_id' => $pesanan->id,
    		'gambar' => $path
    	]);
        $pesanan->produk->konfeksi->user->notify(new Konfirmasi($konfirmasiPembayaran));
    	return redirect('/')->with('flash', 'Konfirmasi Pembayaran berhasil disimpan');
    }
}
