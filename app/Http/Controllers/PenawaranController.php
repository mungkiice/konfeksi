<?php

namespace App\Http\Controllers;

use App\Notifications\PenawaranBaru;
use App\Penawaran;
use App\Pesanan;
use App\StatusPesanan;
use Illuminate\Http\Request;

class PenawaranController extends Controller
{
    public function create($pesananId)
    {
    	$pesanan = Pesanan::find($pesananId);
    	return view('admin.penawaran-form', compact('pesanan'));
    }

    public function show($kodePesanan)
    {
        $pesanan = Pesanan::where('kode_pesanan', $kodePesanan)->first();
        $penawaran = $pesanan->penawaran->first();
        return view('penawaran', compact('penawaran'));
    }

    public function store(Request $request, $pesananId)
    {
    	$this->validate($request, [
    		'biaya' => 'required',
            'tenggat_waktu' => 'required',
        ]);

        $path = '';
        if ($request->gambar != null) {
            $path = $request->gambar->store('pesanan', 'public');
        }

        $pesanan = Pesanan::find($pesananId);
        
        $penawaran = Penawaran::create($pesanan->id,$request->tenggat_waktu,$request->biaya,$request->deskripsi,$path);
        $statusPesanan = StatusPesanan::create($pesanan->id, 'menunggu konfirmasi penawaran');
        $pesanan->user->notify(new PenawaranBaru($penawaran));
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
        $statusPesanan = StatusPesanan::create($pesanan->id, 'menunggu pembayaran DP');
        return view('invoice', compact('pesanan'))->with('flash', 'Penawaran berhasil disetujui');
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
        $statusPesanan = StatusPesanan::create($pesanan->id, 'penawaran ditolak');
        return redirect('/pesanansaya')->with('flash', 'Penawaran berhasil ditolak');
    }
}
