<?php

namespace App\Http\Controllers;

use App\AfterShipAPI;
use App\Pesanan;
use App\RajaOngkirAPI;
use Illuminate\Http\Request;

class KurirController extends Controller
{
	public function infoEkspedisi($asal, $tujuan)
	{
		$couriers = ['jne', 'tiki', 'pos'];
		$result = [];
		foreach ($couriers as $courier) {
			$cost = (new RajaOngkirAPI)->getCost($asal, $tujuan, 10, $courier);
			$result = array_merge($result, $cost);
		}
		return response()->json($result, 200);
	}

	public function checkpoints($kodePesanan)
	{
		$pesanan = Pesanan::filter($kodePesanan);
		if ($pesanan != null) {
			$response = AfterShipAPI::getCheckpoints($pesanan->kurir, $pesanan->nomor_resi);
			return $response;
		}
		return null;
	}
}
