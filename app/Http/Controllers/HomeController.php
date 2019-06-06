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
    // verified
    public function index()
    {
    	$artikels = Artikel::semua();
        return view('home', compact('artikels'))->with('flash', 'Flash di member');
    }
    
    // verified
    public function adminDashboard()
    {   
        return view('admin.admin-dashboard');
    }

    // verified
    public function konfeksiDashboard()
    {
        return view('admin.dashboard');
    }
}
