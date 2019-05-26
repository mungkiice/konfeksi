<?php

namespace App\Http\Controllers;

use App\Events\PesanTerkirim;
use App\Pesan;
use App\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{
    public function kirimPesan(Request $request, $kodePesanan)
    {
    	$pesanan = Pesanan::filter($kodePesanan);
    	$user = Auth::user();
    	$pesan = $pesanan->pesans()->create([
    		'user_id' => $user->id,
    		'teks' => $request->teks,
    	]);
    	broadcast(new PesanTerkirim($user, $pesan))->toOthers();
    	return response()->json([
    		'status' => 'Pesan Terkirim'
    	]);
    }

    public function listPesan($kodePesanan)
    {
    	$pesanan = Pesanan::filter($kodePesanan);
    	return response()->json([
    		'pesan' => $pesanan->pesans()->with('user')->get()
    	]);
    }
        /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages()
    {
        return Pesan::with('user')->get();
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request)
    {
        $user = Auth::user();

        $message = $user->pesans()->create([
            'message' => $request->input('message')
        ]);

        broadcast(new PesanTerkirim($user, $message))->toOthers();

        return ['status' => 'Message Sent!'];
    }
}
