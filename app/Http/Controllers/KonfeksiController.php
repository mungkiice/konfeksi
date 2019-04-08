<?php

namespace App\Http\Controllers;

use App\User;
use App\Konfeksi;
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

        if ($konfeksi != null) {
            $konfeksi->update([
                'diverifikasi' => true
            ]);
        }
        return back()->with('flash', 'Konfeksi berhasil diverifikasi');
    }
}
