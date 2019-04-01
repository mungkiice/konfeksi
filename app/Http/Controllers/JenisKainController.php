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

	public function update(Request $request, $jenisKainId)
	{
		$jenisKain = JenisKain::find($JenisKainId);
		if($jenisKain != null){
			$jenisKain->update([
				'nama' => $request->nama,
				'deskripsi' => $request->deskripsi
			]);
		}
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
