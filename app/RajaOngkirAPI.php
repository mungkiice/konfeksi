<?php

namespace App;

use GuzzleHttp\Client;

class RajaOngkirAPI
{
	protected static $apiKey = '6051f010f4d02b46d5a7d703f03c68d0';

	public static function getClient()
	{
		return new Client([
			'base_uri' => 'https://api.rajaongkir.com/starter/'
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
		return json_decode($response->getBody(), true)['rajaongkir']['results'];
	}
}