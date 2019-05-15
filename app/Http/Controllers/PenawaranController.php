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
        $penawarans = $pesanan->penawaran()->latest()->get();
        return view('penawaran', compact('penawarans', 'pesanan'));
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

    public function konfirmasi(Request $request, $penawaranId)
    {
        $penawaran = Penawaran::find($penawaranId);
        $penawaran->update([
            'status' => $request->status
        ]);
        $pesanan = Pesanan::find($penawaran->pesanan_id);
        if ($request->status == 'diterima') {
            $pesanan->update([
                'biaya' => $penawaran->biaya,
                'tenggat_waktu' => $penawaran->tenggat_waktu,
                'deskripsi' => $penawaran->deskripsi
            ]);
            $statusPesanan = StatusPesanan::create($pesanan->id, 'menunggu pembayaran DP');
            return view('invoice', compact('pesanan'))->with('flash', 'Penawaran berhasil disetujui');
        }else{
            return back()->with('flash', 'Penawaran berhasil ditolak');
        }
    }
}
