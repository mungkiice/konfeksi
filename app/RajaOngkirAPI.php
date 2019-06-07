<?php

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class RajaOngkirAPI
{
	protected static $apiKey = '6051f010f4d02b46d5a7d703f03c68d0';

	public static function client()
	{
		return new Client([
			'base_uri' => 'https://api.rajaongkir.com/starter/',
			'http_errors' => false
		]);
	}

    // verified
	public static function daftarKota()
	{
		$response = self::client()->get('city', [
			'headers' => [
				'key' => self::$apiKey
			]
		]);
		return json_decode($response->getBody(), true)['rajaongkir']['results'];
	}

	//verified
	public static function ongkirEkspedisi($origin, $destination, $weight, $courier)
	{
		$response = self::client()->post('cost', [
			'headers' => [
				'key' => self::$apiKey
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

	public static function ongkir($kotaAsal, $kotaTujuan, $ekspedisi)
	{
		if ($ekspedisi != null) {
			$arr = explode(' ', trim($ekspedisi));
			$kurir = array_shift($arr);
			$jenis = implode(' ', $arr);
			$result = self::getCost($kotaAsal, $kotaTujuan, 10, $kurir);
			foreach ((array) $result as $item) {
				if ($item['service'] == $jenis) {
					return $item['cost'][0]['value'];
				}
			}
		}
		return 0;
	}
}