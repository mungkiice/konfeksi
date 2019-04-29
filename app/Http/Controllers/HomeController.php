<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Mail\BuktiPemesananMail;
use App\Mail\PenawaranMail;
use App\Mail\PesananMail;
use App\Mail\ProgresMail;
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
        return view('home', compact('artikels'))->with('flash', 'Flash di member');
    }

    public function email()
    {
        $pesanan = auth()->user()->pesanans()->latest()->first();
        $pdf = PDF::loadView('mail.bukti-pemesanan', compact('pesanan'));
        auth()->user()->notify(new BuktiPemesananMail()); 
        Mail::to(auth()->user())->send(new BuktiPemesananMail($pesanan, $pdf));
        Mail::to(auth()->user())->send(new PenawaranMail());
        Mail::to(auth()->user())->send(new PesananMail());
        Mail::to(auth()->user())->send(new ProgresMail());
    }

    public function showInvoice()
    {
        $pesanan = Pesanan::first();
        return view('invoice', compact('pesanan'));
    }
}
