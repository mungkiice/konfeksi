<?php

namespace App\Http\Controllers;

use App\Konfeksi;
use App\Notifications\KonfeksiVerification;
use App\User;
use Illuminate\Http\Request;

class KonfeksiController extends Controller
{
    public function index()
    {
    	$konfeksis = Konfeksi::where('diverifikasi', 1)->get();
    	return view('konfeksis', compact('konfeksis'));
    }

    public function show($konfeksiId)
    {
    	$konfeksi = Konfeksi::find($konfeksiId);
    	return view('konfeksi', compact('konfeksi'));
    }

    public function listKonfeksi()
    {
        $users = User::where('role', 'Konfeksi')->get();
        return view('admin.konfeksis', compact('users'));
    }

    public function verify($konfeksiId)
    {
        $konfeksi = Konfeksi::find($konfeksiId);
        $konfeksi->update([
            'diverifikasi' => true
        ]);
        $konfeksi->user->notify(new KonfeksiVerification($konfeksi));
        return back()->with('flash', 'Konfeksi berhasil diverifikasi');
    }
}
