<?php

namespace App;

use GuzzleHttp\Client;

class AfterShipAPI
{
	protected static $apiKey = '625c07d0-29b7-42ab-9420-674e87eeeef6';

	public static function client()
	{
		return new Client([
			'base_uri' => 'https://api.aftership.com/v4/'
		]);
	}

	// public static function getCouriers()
	// {
	// 	$response = self::client()->get('couriers', [
	// 		'headers' => [
	// 			'aftership-api-key' => self::$apiKey,
	// 			'Content-Type' => 'application/json'
	// 		],
	// 	]);
	// 	return json_decode($response->getBody(), true)['data']['couriers'];
	// }

	public static function getCheckpoints($courier, $trackingNumber)
	{
		$response = self::client()->get('trackings/'.self::getSlug($courier).'/'.$trackingNumber, [
			'headers' => [
				'aftership-api-key' => self::$apiKey,
				'Content-Type' => 'application/json'
			],
		]);
		return json_decode($response->getBody(), true)['data']['tracking']['checkpoints'];
	}

	public static function addTracking($courier, $trackingNumber)
	{
		$response = self::client()->post('trackings', [
			'headers' => [
				'aftership-api-key' => self::$apiKey,
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
		$response = self::client()->get('last_checkpoint/'.self::getSlug($courier).'/'.$trackingNumber, [
			'headers' => [
				'aftership-api-key' => self::$apiKey,
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