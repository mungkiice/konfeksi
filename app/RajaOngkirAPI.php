<?php

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class RajaOngkirAPI
{
	// protected static $apiKey = '6051f010f4d02b46d5a7d703f03c68d0';

	// public static function client()
	// {
	// 	return new Client([
	// 		'base_uri' => 'https://api.rajaongkir.com/starter/',
	// 		'http_errors' => false
	// 	]);
	// }

    // verified
	public static function daftarKota()
	{
		$response = (new Client(['base_uri' => 'https://api.rajaongkir.com/starter/','http_errors' => false]))->get('city', [
			'headers' => [
				'key' => env('RAJAONGKIR_APIKEY')
			]
		]);
		return json_decode($response->getBody(), true)['rajaongkir']['results'];
	}

	//verified
	public static function ongkirEkspedisi($origin, $destination, $weight, $courier)
	{
		$response = (new Client(['base_uri' => 'https://api.rajaongkir.com/starter/','http_errors' => false]))->post('cost', [
			'headers' => [
				'key' => env('RAJAONGKIR_APIKEY')
			],
			'json' => [
				'origin' => $origin,
				'destination' => $destination,
				'weight' => $weight,
				'courier' => $courier
			]
		]);
		if ($response->getStatusCode() == 200) {
			return json_decode($response->getBody(), true)['rajaongkir']['results'];	
		}
		return null;		
	}

	//verified
	public static function ongkir($kotaAsal, $kotaTujuan, $ekspedisi)
	{
		if ($ekspedisi != null) {
			$arr = explode(' ', trim($ekspedisi));
			$kurir = array_shift($arr);
			$jenis = implode(' ', $arr);
			$result = self::ongkirEkspedisi($kotaAsal, $kotaTujuan, 10, $kurir);
			foreach ((array) $result[0]['costs'] as $item) {
				if ($item['service'] == $jenis) {
					return $item['cost'][0]['value'];
				}
			}
		}
		return 0;
	}
}