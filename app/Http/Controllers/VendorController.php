<?php

namespace App\Http\Controllers;

use App\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
    	$vendors = Vendor::where('valid', 1)->get();
    	return view('vendors', compact('vendors'));
    }

    public function show($vendorId)
    {
    	$vendor = Vendor::find($vendorId);
    	return view('vendor', compact('vendor'));
    }
}
