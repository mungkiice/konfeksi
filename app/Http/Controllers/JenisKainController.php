<?php

namespace App\Http\Controllers;

use App\JenisKain;
use Illuminate\Http\Request;

class JenisKainController extends Controller
{
	public function index()
	{
		$jenisKains = JenisKain::all();
		return view('admin.jenis-kains', compact('jenisKains'));
	}

	public function create()
	{
		return view('admin.jenis-kain-form');
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'nama' => 'required',
			'deskripsi' => 'required',
			'gambar' => 'required|image|mimes:jpeg,jpg,png,gif,svg'
		]);

		if ($request->hasFile('gambar')) {
			$path = $request->gambar->store('image', 'public');
		}

		$jeniskain = JenisKain::create([
			'nama' => $request->nama,
			'deskripsi' => $request->deskripsi
		]);
		$jeniskain->image()->create([
			'path' => $path,
			'type' => 'img'
		]);
		return redirect('/admin/jeniskain')->with('flash', 'jenis kain berhasil ditambahkan');
	}
	
	public function update(Request $request, $jenisKainId)
	{
		$jenisKain = JenisKain::find($jenisKainId);
		if($jenisKain != null){
			$jenisKain->update([
				'nama' => $request->nama,
				'deskripsi' => $request->deskripsi
			]);
			if($request->hasFile('gambar')){
				$path = $request->gambar->store('image', 'public');
				$jenisKain->image->delete();
				$jenisKain->image()->create([
					'path' => $path,
					'type' => 'img'
				]);
			}
		}
		return back()->with('flash', 'jenis kain berhasil diperbarui');
	}

	public function destroy($jenisKainId)
	{
		$jenisKain = JenisKain::find($jenisKainId);
		if($jenisKain != null){
			$jenisKain->delete();	
		}
		return back()->with('flash', 'jenis kain berhasil dihapus');
	}
}
