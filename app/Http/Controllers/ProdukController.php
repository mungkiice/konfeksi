<?php

namespace App\Http\Controllers;

use App\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    //verified
    public function show($produkId)
    {
        $produk = Produk::temukan($produkId);
    	return view('produk', compact('produk'));
    }

    //verified
    public function index()
    {
    	$produks = auth()->user()->konfeksi->produks;
    	return view('admin.produks', compact('produks'));
    }

    //verified
    public function create()
    {
    	return view('admin.produk-form');
    }

    //verified
    public function edit($produkId)
    {
        $produk = Produk::temukan($produkId);
        return view('admin.produk-edit-form', compact('produk'));
    }

    //verified
    public function store()
    {
    	$this->validate(request(), [
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required',
            'harga' => 'required'
        ]);
            $path = request('gambar')->store('image', 'public');
        $produk = Produk::buat(auth()->user()->konfeksi->id, request('nama'), request('deskripsi'),$path,request('harga'));

        return redirect('/konfeksi/produk')->with('flash', 'produk berhasil ditambahkan');
    }

    //verified
    public function update($produkId)
    {
        $produk = Produk::temukan($produkId);
        if($produk != null){
            $path = null;
            if (request('gambar')) {
                $path = request('gambar')->store('produk', 'public');
            }
            $produk->perbarui(request('nama'), request('deskripsi'), $path, request('harga'));
        }
    	return redirect('/konfeksi/produk')->with('flash', 'Produk berhasil diperbarui');
    }

    //verified
    public function destroy($produkId)
    {
        $produk = Produk::temukan($produkId);
        if($produk != null){
            $produk->hapus();
        }
        return back()->with('flash', 'Produk berhasil dihapus');
    }
}
