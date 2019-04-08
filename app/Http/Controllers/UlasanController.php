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
}
