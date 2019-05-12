<?php

namespace App;

use GuzzleHttp\Client;

class RajaOngkirAPI
{
	protected $client;
	protected $apiKey = '6051f010f4d02b46d5a7d703f03c68d0';

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
				'key' => $this->apiKey
			]
		]);
		return json_decode($response->getBody(), true)['rajaongkir']['results'];
	}

	public function getCost($origin, $destination, $weight, $courier)
	{
		$response = $this->client->post('cost', [
			'headers' => [
				'key' => $this->apiKey
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