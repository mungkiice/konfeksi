<?php

namespace App\Http\Controllers;

use App\JenisKain;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    	$jenisKains = JenisKain::all();
        return view('welcome', compact('jenisKains'));
    }
}
