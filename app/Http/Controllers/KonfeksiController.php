<?php

namespace App\Http\Controllers;

use App\Konfeksi;
use App\Notifications\KonfeksiVerification;
use App\Ulasan;
use App\User;
use Illuminate\Http\Request;

class KonfeksiController extends Controller
{
    // verified
    public function index()
    {
        $konfeksis = Konfeksi::daftarVerified();
        return view('konfeksis', compact('konfeksis'));
    }

    // verified
    public function show($konfeksiId)
    {
        $konfeksi = Konfeksi::temukan($konfeksiId);
        return view('konfeksi', compact('konfeksi'));
    }

    // verified
    public function listKonfeksi()
    {
        $konfeksis = Konfeksi::semua();
        return view('admin.konfeksis', compact('konfeksis'));
    }

    // verified
    public function verify($konfeksiId)
    {
        $konfeksi = Konfeksi::temukan($konfeksiId);
        $konfeksi->verifikasi();
        $konfeksi->user->notify(new KonfeksiVerification($konfeksi));
        return back()->with('flash', 'Konfeksi berhasil diverifikasi');
    }

    //verified
    public function tambahUlasan()
    {
        $this->validate(request(), [
            'rating' => 'required'
        ]);
        Ulasan::buat(auth()->user()->id,request('konfeksi_id'),request('rating'),request('komentar'));
        return back()->with('flash', 'Ulasan Berhasil Ditambahkan');   
    }
}
