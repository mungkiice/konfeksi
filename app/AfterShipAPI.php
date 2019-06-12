<?php

namespace App;

use GuzzleHttp\Client;

class AfterShipAPI
{

	// public static function getCouriers()
	// {
	// 	$response = new Client([
			// 'base_uri' => 'https://api.aftership.com/v4/'
		// ])->get('couriers', [
	// 		'headers' => [
	// 			'aftership-api-key' => env('AFTERSHIP_APIKEY'),
	// 			'Content-Type' => 'application/json'
	// 		],
	// 	]);
	// 	return json_decode($response->getBody(), true)['data']['couriers'];
	// }

	public static function getCheckpoints($courier, $trackingNumber)
	{
		$response = (new Client([
			'base_uri' => 'https://api.aftership.com/v4/'
		]))->get('trackings/'.self::getSlug($courier).'/'.$trackingNumber, [
			'headers' => [
				'aftership-api-key' => env('AFTERSHIP_APIKEY'),
				'Content-Type' => 'application/json'
			],
		]);
		return json_decode($response->getBody(), true)['data']['tracking']['checkpoints'];
	}

	public static function addTracking($courier, $trackingNumber)
	{
		$response = (new Client([
			'base_uri' => 'https://api.aftership.com/v4/'
		]))->post('trackings', [
			'headers' => [
				'aftership-api-key' => env('AFTERSHIP_APIKEY'),
				'Content-Type' => 'application/json'
			],
			'json' => [
				'tracking' => [
					'slug' => self::getSlug($courier),
					'tracking_number' => $trackingNumber
				],
			],
		]);
		return json_decode($response->getBody(), true);		
	}

	public static function getLastCheckPoint($courier, $trackingNumber)
	{
		$response = (new Client([
			'base_uri' => 'https://api.aftership.com/v4/'
		]))->get('last_checkpoint/'.self::getSlug($courier).'/'.$trackingNumber, [
			'headers' => [
				'aftership-api-key' => env('AFTERSHIP_APIKEY'),
				'Content-Type' => 'application/json'
			],
		]);
		return json_decode($response->getBody(), true);
	}

	public static function getSlug($courier)
	{
		$arr = explode(' ', trim($courier));
		switch ($arr[0]) {
			case 'jne':
			return 'jne';
			break;
			case 'tiki':
			return 'tiki';
			break;
			case 'pos':
			return 'pos-indonesia';
			break;
		}
	}
}