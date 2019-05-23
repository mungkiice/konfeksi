<?php

namespace App\Http\Controllers;

use App\Ulasan;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    public function index()
    {
    	$ulasans = Ulasan::where('vendor_id', auth()->user()->vendor->id)->get();
    	return view('admin.ulasans', compact('ulasans'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'rating' => 'required'
        ]);
    	Ulasan::create([
    		'user_id' => auth()->user()->id,
    		'konfeksi_id' => $request->konfeksi_id,
    		'rating' => $request->rating,
    		'komentar' => $request->komentar
    	]);
    	return back()->with('flash', 'Ulasan Berhasil Ditambahkan');
    }
}
