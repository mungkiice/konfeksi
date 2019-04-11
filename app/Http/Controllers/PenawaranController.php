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

    public function confirm($penawaranId)
    {
        $penawaran = Penawaran::find($penawaranId);
        $penawaran->update([
            'status' => 'diterima'
        ]);
        $pesanan = Pesanan::find($penawaran->pesanan_id);
        $pesanan->update([
            'biaya' => $penawaran->biaya,
            'tenggat_waktu' => $penawaran->tenggat_waktu,
            'deskripsi' => $penawaran->deskripsi
        ]);
        StatusPesanan::create([
            'pesanan_id' => $pesanan->id,
            'keterangan' => 'menunggu pembayaran DP'
        ]);
        return view('invoice')->with('flash', 'Penawaran berhasil disetujui.');
    }

    public function reject($penawaranId)
    {
                $penawaran = Penawaran::find($penawaranId);
        $penawaran->update([
            'status' => 'ditolak'
        ]);
        $pesanan = Pesanan::find($penawaran->pesanan_id);
        $pesanan->update([
            'biaya' => $penawaran->biaya,
            'tenggat_waktu' => $penawaran->tenggat_waktu,
            'deskripsi' => $penawaran->deskripsi
        ]);
        return back()->with('flash', 'Penawaran berhasil ditolak.');
    }
}
