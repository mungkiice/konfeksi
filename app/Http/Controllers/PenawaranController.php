<?php

namespace App\Http\Controllers;

use App\Penawaran;
use App\Pesanan;
use Illuminate\Http\Request;

class PenawaranController extends Controller
{
    public function create($pesananId)
    {
    	$pesanan = Pesanan::find($pesananId);
    	return view('admin.penawaran-form', compact('pesanan'));
    }

    public function store(Request $request, $pesananId)
    {
    	$pesanan = Pesanan::find($pesananId);
    	$this->validate($request, [
    		'biaya' => 'required|integer',
    		'gambar' => 'image|mimes:png,jpg,jpeg'
    	]);
    	$path = '';
    	if ($request->hasFile('gambar')) {
    		$path = $request->gambar->store('pesanan', 'public');
    	}
    	Penawaran::create([
    		'pesanan_id' => $pesanan->id,
    		'tenggat_waktu' => $request->tenggat_waktu,
    		'biaya' => $request->biaya,
    		'deskripsi' => $request->deskripsi,
    		'gambar' => $path
    	]);
    	
        $pesanan->statusPesanans()->create([
    		'keterangan' => 'menunggu konfirmasi penawaran'
    	]);

    	return redirect('/konfeksi')->with('flash', 'Penawaran berhasil dikirim');
    }
}
