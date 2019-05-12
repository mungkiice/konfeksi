<?php

namespace App\Http\Controllers;

use App\AfterShipAPI;
use App\Notifications\PesananBaru;
use App\Notifications\ProgresPesanan;
use App\Pesanan;
use App\Produk;
use App\RajaOngkirAPI;
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
		$kotas = (new RajaOngkirAPI)->getCities();
		$kurirs = (new AfterShipAPI)->getCouriers();
		return view('pesan', compact('produk', 'kotas', 'kurirs'));
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
		$pesanan = Pesanan::create(auth()->user()->id, $request->produk_id, $request->tenggat_waktu, $request->deskripsi, $path, $request->alamat, $jumlah, $request->kurir);
		$statusPesanan = StatusPesanan::create($pesanan->id, 'menunggu respon dari konfeksi');
		$pesanan->produk->konfeksi->user->notify(new PesananBaru($pesanan));
		return redirect('/')->with('flash', 'Pesanan berhasil dikirim');
	}

	public function updateStatus(Request $request, $pesananId)
	{
		$pesanan = Pesanan::find($pesananId);
		$this->validate($request, [
			'keterangan' => 'required'
		]);

		$statusPesanan = StatusPesanan::create($pesanan->id, $request->keterangan);
		$pesanan->user->notify(new ProgresPesanan($statusPesanan));
		return back()->with('flash', 'Status Pesanan berhasil disimpan');
	}
}
