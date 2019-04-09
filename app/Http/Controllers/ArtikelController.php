<?php

namespace App\Http\Controllers;

use App\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
	public function index()
	{
		$artikels = Artikel::all();
		return view('admin.artikels', compact('artikels'));
	}

	public function create()
	{
		return view('admin.artikel-form');
	}

	public function edit($artikelId)
	{
		$artikel = Artikel::find($artikelId);
		return view('admin.artikel-edit-form', compact('artikel'));
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'judul' => 'required',
			'deskripsi' => 'required',
			'gambar' => 'required|image|mimes:jpeg,jpg,png'
		]);

		$path = '';
		if ($request->hasFile('gambar')) {
			$path = $request->gambar->store('artikel', 'public');
		}

		Artikel::create([
			'judul' => $request->judul,
			'deskripsi' => $request->deskripsi,
			'gambar' => $path 
		]);
		return redirect('/admin/artikel')->with('flash', ' artikel jenis kain berhasil ditambahkan');
	}
	
	public function update(Request $request, $artikelId)
	{
		$this->validate($request, [
			'gambar' => 'image|mimes:jpeg,jpg,png'
		]);
		$artikel = Artikel::find($artikelId);
		if($artikel != null){
			$path = null;
			if ($request->hasFile('gambar')) {
				$path = $request->gambar->store('artikel', 'public');
			}
			$artikel->update([
				'judul' => $request->judul ?: $artikel->judul,
				'deskripsi' => $request->deskripsi ?: $artikel->deskripsi,
				'gambar' => $path ?: $artikel->gambar
			]);
		}
		return redirect('/admin/artikel')->with('flash', 'artikel jenis kain berhasil diperbarui');
	}

	public function destroy($artikelId)
	{
		$artikel = Artikel::find($artikelId);
		if($artikel != null){
			$artikel->delete();	
		}
		return back()->with('flash', 'artikel jenis kain berhasil dihapus');
	}
}
