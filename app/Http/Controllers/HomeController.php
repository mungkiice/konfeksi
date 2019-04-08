<?php

namespace App\Http\Controllers;

use App\Artikel;
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
    	$artikels = Artikel::all();
        return view('home', compact('artikels'));
    }
}
