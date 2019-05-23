<?php

namespace App\Http\Controllers;

use App\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function show($produkId)
    {
        $produk = Produk::find($produkId);
    	return view('produk', compact('produk'));
    }

    public function index()
    {
    	$produks = auth()->user()->konfeksi->produks;
    	return view('admin.produks', compact('produks'));
    }

    public function create()
    {
    	return view('admin.produk-form');
    }

    public function edit($produkId)
    {
        $produk = Produk::find($produkId);
        return view('admin.produk-edit-form', compact('produk'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|mimes:jpg,jpeg,png',
            'harga' => 'required'
        ]);
        $path = '';
        if($request->hasFile('gambar')){
            $path = $request->gambar->store('image', 'public');
        }

        $produk = Produk::create([
            'konfeksi_id' => auth()->user()->konfeksi->id,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'gambar' => $path,
            'harga' => $request->harga
        ]);

        return redirect('/konfeksi/produk')->with('flash', 'produk berhasil ditambahkan');
    }

    public function update(Request $request, $produkId)
    {
        $produk = Produk::find($produkId);
        if($produk != null){
            $path = null;
            if ($request->hasFile('gambar')) {
                $path = $request->gambar->store('produk', 'public');
            }
            $produk->update([
                'nama' => $request->nama ?: $produk->nama,
                'deskripsi' => $request->deskripsi ?: $produk->deskripsi,
                'gambar' => $path ?: $produk->gambar,
                'harga' => $request->harga ?: $produk->harga
            ]);
        }
    	return redirect('/konfeksi/produk')->with('flash', 'Produk berhasil diperbarui');
    }

    public function destroy($produkId)
    {
        $produk = Produk::find($produkId);
        if($produk != null){
            $produk->delete();
        }
        return back()->with('flash', 'Produk berhasil dihapus');
    }
}
