<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KomplainController extends Controller
{
    public function index()
    {
    	$vendor = auth()->user()->vendor;
    	$komplains = collect();
    	$vendor->pesanans->each(function($pesanan){
    		if ($pesanan->komplain != null) {
    			$komplains->push($pesanan->komplain);
    		}
    	});
    	return view('admin.komplains', compact('komplains'));
    }
}
