<?php

namespace App\Http\Controllers;

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
}
