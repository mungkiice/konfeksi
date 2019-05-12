<?php

namespace App;

use GuzzleHttp\Client;

class AfterShipAPI
{
	protected $client; 
	protected $apiKey = 'e0f76661-bd3e-4fd4-bab2-810fa6edc3f7';

	public function __construct()
	{
		$this->client = new Client([
			'base_uri' => 'https://api.aftership.com/v4/'
		]);
	}

	public function getCouriers()
	{
		$response = $this->client->get('couriers', [
			'headers' => [
				'aftership-api-key' => $this->apiKey,
				'Content-Type' => 'application/json'
			],
		]);
		return json_decode($response->getBody(), true)['data']['couriers'];
	}

	public function getCheckpoints($courier, $trackingNumber)
	{
		$response = $this->client->get('trackings/'.$courier.'/'.$trackingNumber, [
			'headers' => [
				'aftership-api-key' => $this->apiKey,
				'Content-Type' => 'application/json'
			],
		]);
		return json_decode($response->getBody(), true);
	}

	public function addTracking($courier, $tracking_number)
	{
		$response = $this->client->post('trackings/'.$courier.'/'.$receipt, [
			'headers' => [
				'aftership-api-key' => $this->apiKey,
				'Content-Type' => 'application/json'
			],
			'json' => [
				'tracking' => [
					'slug' => $courier,
					'tracking_number' => $trackingNumber
				],
			],
		]);
		return json_decode($response->getBody(), true);		
	}

	public function getLastCheckPont($courier, $trackingNumber)
	{
		$response = $this->client->get('last_checkpoint/'.$courier.'/'.$trackingNumber, [
			'headers' => [
				'aftership-api-key' => $this->apiKey,
				'Content-Type' => 'application/json'
			],
		]);
		return json_decode($response->getBody(), true);
	}
}