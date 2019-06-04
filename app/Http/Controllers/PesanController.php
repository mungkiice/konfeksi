<?php

namespace App\Http\Controllers;

use App\Events\PesanTerkirim;
use App\Pesan;
use App\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{
    public function listPesan($kodePesanan)
    {
        $pesanan = Pesanan::filter($kodePesanan);
        return $pesanan->pesans()->with('user')->get();
    }

    public function kirimPesan(Request $request, $kodePesanan)
    {
        $user = Auth::user();
        $pesanan = Pesanan::filter($kodePesanan);
        $message = $user->pesans()->create([
            'pesanan_id' => $pesanan->id,
            'teks' => $request->teks
        ]);

        // broadcast(new PesanTerkirim($message->load('user')))->toOthers();
        event(new PesanTerkirim($message->load('user')));
        return ['status' => 'Message Sent!'];
    }
}
