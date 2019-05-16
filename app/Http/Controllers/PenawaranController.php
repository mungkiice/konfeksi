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
    	$pesanan = Pesanan::temukan($pesananId);
    	return view('admin.penawaran-form', compact('pesanan'));
    }

    public function show($kodePesanan)
    {
        $pesanan = Pesanan::filter($kodePesanan)->first();
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

        $pesanan = Pesanan::temukan($pesananId);
        
        $penawaran = Penawaran::buat($pesanan->id,$request->tenggat_waktu,$request->biaya,$request->deskripsi,$path);
        $statusPesanan = StatusPesanan::buat($pesanan->id, 'menunggu konfirmasi penawaran');
        $pesanan->user->notify(new PenawaranBaru($penawaran));
        return redirect('/konfeksi')->with('flash', 'Penawaran berhasil dikirim');
    }

    public function konfirmasi(Request $request, $penawaranId)
    {
        $penawaran = Penawaran::temukan($penawaranId);
        $penawaran->perbarui($request->status);
        $pesanan = Pesanan::temukan($penawaran->pesanan_id);
        if ($request->status == 'diterima') {
            $pesanan->perbarui($penawaran->biaya, $penawaran->tenggat_waktu, $penawaran->deskripsi);
            $statusPesanan = StatusPesanan::buat($pesanan->id, 'menunggu pembayaran DP');
            return view('invoice', compact('pesanan'))->with('flash', 'Penawaran berhasil disetujui');
        }else{
            return back()->with('flash', 'Penawaran berhasil ditolak');
        }
    }
}
