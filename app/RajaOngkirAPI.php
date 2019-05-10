<?php

namespace App;

use GuzzleHttp\Client;

class RajaOngkirAPI
{
	protected $client;
	protected static $apiKey = '6051f010f4d02b46d5a7d703f03c68d0';

	public function __construct()
	{
		$this->client = new Client([
			'base_uri' => 'https://api.rajaongkir.com/starter/'
		]);
	}

	public function getCities()
	{
		$response = $this->client->get('city', [
			'headers' => [
				'key' => $apiKey
			]
		]);
		return json_decode($response->getBody(), true);
	}

	public function getCost($origin, $destination, $weight, $courier)
	{
		$response = $this->client->get('cost', [
			'headers' => [
				'key' => $apiKey
			],
			'body' => [
				'origin' => $origin,
				'destination' => $destination,
				'weight' => $weight,
				'courier' => $courier
			]
		]);
		return json_decode($response->getBody(), true);
	}
}