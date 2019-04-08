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
            'gambar' => 'required|mimes:jpg,jpeg,png,gif,svg'
        ]);


        $produk = Produk::create([
            'vendor_id' => auth()->user()->vendor->id,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi
        ]);

        if($request->hasFile('gambar')){
            $path = $request->gambar->store('image', 'public');
            $produk->images()->create([
                'path' => $path,
                'type' => 'img'
            ]);
        }

        return redirect('/vendor/produk')->with('flash', 'produk berhasil ditambahkan');
    }

    public function update(Request $request, $produkId)
    {
        $produk = Produk::find($produkId);
        if($produk != null){
            $produk->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi
            ]);
        }
    	return back()->with('flash', 'Produk hasil diperbarui');
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
