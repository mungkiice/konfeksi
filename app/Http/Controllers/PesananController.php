<?php

namespace App\Http\Controllers;

use App\Notifications\PesananBaru;
use App\Notifications\ProgresPesanan;
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

	public function indexMember()
	{
		$pesanans = auth()->user()->pesanans;
		return view('pesanan', compact('pesanans'));
	}

	public function create($produkId)
	{
		$produk = Produk::find($produkId);
		return view('pesan', compact('produk'));
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'deskripsi' => 'required',
			'file_desain' => 'required'
		]);
		$path = $request->file_desain->store('pesanan', 'public');
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
		$statusPesanan = StatusPesanan::create([
			'pesanan_id' => $pesanan->id,
			'keterangan' => 'menunggu respon dari konfeksi'
		]);
		$pesanan->produk->konfeksi->user->notify(new PesananBaru($pesanan));
		return redirect('/')->with('flash', 'Pesanan berhasil dikirim');
	}

	public function updateStatus(Request $request, $pesananId)
	{
		$pesanan = Pesanan::find($pesananId);
		$this->validate($request, [
			'keterangan' => 'required'
		]);

		$statusPesanan = StatusPesanan::create([
			'pesanan_id' => $pesanan->id,
			'keterangan' => $request->keterangan
		]);
		$pesanan->user->notify(new ProgresPesanan($statusPesanan));
		return back()->with('flash', 'Status Pesanan berhasil disimpan.');
	}
}
