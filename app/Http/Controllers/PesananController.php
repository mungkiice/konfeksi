<?php

namespace App\Http\Controllers;

use App\Produk;
use Illuminate\Http\Request;

class PesananController extends Controller
{
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
			'deskripsi' => 'required'
		]);
	}
}
