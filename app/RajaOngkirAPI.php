<?php

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class RajaOngkirAPI
{
	protected static $apiKey = '6051f010f4d02b46d5a7d703f03c68d0';

	public static function getClient()
	{
		return new Client([
			'base_uri' => 'https://api.rajaongkir.com/starter/',
			'http_errors' => false
		]);
	}

	public static function getCities()
	{
		$response = self::getClient()->get('city', [
			'headers' => [
				'key' => self::$apiKey
			]
		]);
		return json_decode($response->getBody(), true)['rajaongkir']['results'];
	}

	public static function getCost($origin, $destination, $weight, $courier)
	{
		$response = self::getClient()->post('cost', [
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
			return json_decode($response->getBody(), true)['rajaongkir']['results'][0]['costs'];	
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