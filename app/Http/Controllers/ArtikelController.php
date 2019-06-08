<?php

namespace App\Http\Controllers;

use App\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
	//verified
	public function index()
	{
		$artikels = Artikel::semua();
		return view('admin.artikels', compact('artikels'));
	}

	//verified
	public function create()
	{
		return view('admin.artikel-form');
	}

	//verified
	public function edit($artikelId)
	{
		$artikel = Artikel::temukan($artikelId);
		return view('admin.artikel-edit-form', compact('artikel'));
	}

	//verified
	public function store()
	{
		$this->validate(request(), [
			'judul' => 'required',
			'deskripsi' => 'required',
			'gambar' => 'required'
		]);
		$path = request('gambar')->store('artikel', 'public');

		Artikel::buat(request('judul'), request('deskripsi'),$path);
		return redirect('/admin/artikel')->with('flash', ' artikel berhasil ditambahkan');
	}
	
	//verified
	public function update($artikelId)
	{
		$artikel = Artikel::temukan($artikelId);
		if($artikel != null){
			$path = null;
			if (request('gambar')) {
				$path = request('gambar')->store('artikel', 'public');
			}
			$artikel->perbarui(request('judul'),request('deskripsi'),$path);
		}
		return redirect('/admin/artikel')->with('flash', 'artikel berhasil diperbarui');
	}

	//verified
	public function destroy($artikelId)
	{
		$artikel = Artikel::temukan($artikelId);
		if($artikel != null){
			$artikel->hapus();	
		}
		return back()->with('flash', 'artikel berhasil dihapus');
	}
}
