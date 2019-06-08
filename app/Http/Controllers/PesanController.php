<?php

namespace App\Http\Controllers;

use App\Events\PesanTerkirim;
use App\Pesan;
use App\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{
    //verified
    public function listPesan($kodePesanan)
    {
        $pesanan = Pesanan::filter($kodePesanan);
        return $pesanan->pesans()->with('user')->get();
    }

    //verified
    public function kirimPesan($kodePesanan)
    {
        $user = Auth::user();
        $pesanan = Pesanan::filter($kodePesanan);
        $pesan = Pesan::buat($user->id, $pesanan->id, request('teks'));

        // broadcast(new PesanTerkirim($message->load('user')))->toOthers();
        event(new PesanTerkirim($pesan->denganDataUser()));
        return ['status' => 'Message Sent!'];
    }
}
