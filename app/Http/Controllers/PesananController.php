<?php

namespace App\Http\Controllers;

use App\Pesanan;
use App\Produk;
use App\StatusPesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
	public function index()
	{
		// $pesanans = auth()->user()->konfeksi->pesanans;
		$pesanans = Pesanan::all();
		return view('admin.pesanans', compact('pesanans'));
	}

	public function create($produkId)
	{
		$produk = Produk::find($produkId);
		return view('pesan', compact('produk'));
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'produk_id' => 'required|exists:produks,id',
			'tenggat_waktu' => 'required',
			'deskripsi' => 'required',
			'file_desain' => 'required'
		]);
		if ($request->hasFile('file_desain')) {
			$path = $request->file_desain->store('pesanan', 'public');
		}
		$jumlah = [
			'S' => $request->small ?: 0,
			'M' => $request->medium ?: 0,
			'L' => $request->large ?: 0,
			'XL' => $request->extra_large ?: 0
		];
		$pesanan = Pesanan::create([
			'user_id' => auth()->user()->id,
			'kode_pesanan' => rand(1000000, 9999999),
			'produk_id' => $request->produk_id,
			'tenggat_waktu' => $request->tenggat_waktu,
			'deskripsi' => $request->deskripsi,
			'file_desain' => $path,
			'alamat' => $request->alamat,
			'jumlah' => json_encode($jumlah)
		]);
		StatusPesanan::create([
			'pesanan_id' => $pesanan->id,
			'keterangan' => 'Menunggu respon dari konfeksi'
		]);
		return redirect('/')->with('flash', 'Pesanan berhasil dikirim');
	}

	public function updateStatus(Request $request, $pesananId)
	{
		$pesanan = Pesanan::find($pesananId);
		$this->validate($request, [
			'keterangan' => 'required'
		]);

		StatusPesanan::create([
			'pesanan_id' => $pesanan->id,
			'keterangan' => $request->keterangan
		]);

		return back()->with('flash', 'Status Pesanan berhasil disimpan.');
	}
}
