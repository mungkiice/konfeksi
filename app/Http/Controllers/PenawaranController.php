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
    	$this->validate($request, [
    		'biaya' => 'required|integer',
    		'gambar' => 'image|mimes:png,jpg,jpeg'
    	]);

    	if ($request->hasFile('gambar')) {
    		$path = $request->gambar->store('pesanan', 'public');
    	}

        $pesanan = Pesanan::find($pesananId);
    	
        Penawaran::create([
    		'pesanan_id' => $pesanan->id,
    		'tenggat_waktu' => $request->tenggat_waktu,
    		'biaya' => $request->biaya,
    		'deskripsi' => $request->deskripsi,
    		'gambar' => $path
    	]);
        StatusPesanan::create([
            'pesanan_id' => $pesanan->id,
            'keterangan' => 'menunggu konfirmasi penawaran'
        ]);

        return redirect('/konfeksi')->with('flash', 'Penawaran berhasil dikirim');
    }
}
