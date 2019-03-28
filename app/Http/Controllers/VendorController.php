<?php

namespace App\Http\Controllers;

use App\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
    	$vendors = Vendor::all();
    	return view('vendors', compact('vendors'));
    }
}
