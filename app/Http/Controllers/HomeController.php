<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Mail\InvoiceMail;
use App\Pesanan;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

    public function email()
    {
        $pesanan = auth()->user()->pesanans()->latest()->first();
        $pdf = PDF::loadView('mail-invoice'); 
        Mail::to(auth()->user())->send(new InvoiceMail($pesanan, $pdf));
    }

    public function showInvoice()
    {
        $pesanan = Pesanan::first();
        return view('invoice', compact('pesanan'));
    }
}
