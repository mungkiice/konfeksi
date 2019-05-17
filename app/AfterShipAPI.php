<?php

namespace App;

use GuzzleHttp\Client;

class AfterShipAPI
{
	protected static $apiKey = 'e0f76661-bd3e-4fd4-bab2-810fa6edc3f7';

	public static function getClient()
	{
		return new Client([
			'base_uri' => 'https://api.aftership.com/v4/'
		]);
	}

	public static function getCouriers()
	{
		$response = self::getClient()->get('couriers', [
			'headers' => [
				'aftership-api-key' => self::$apiKey,
				'Content-Type' => 'application/json'
			],
		]);
		return json_decode($response->getBody(), true)['data']['couriers'];
	}

	public static function getCheckpoints($courier, $trackingNumber)
	{
		$response = self::getClient()->get('trackings/'.self::getSlug($courier).'/'.$trackingNumber, [
			'headers' => [
				'aftership-api-key' => self::$apiKey,
				'Content-Type' => 'application/json'
			],
		]);
		return json_decode($response->getBody(), true)['data']['tracking']['checkpoints'];
	}

	public static function addTracking($courier, $tracking_number)
	{
		$response = self::getClient()->post('trackings/'.self::getSlug($courier).'/'.$receipt, [
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

	public static function getLastCheckPont($courier, $trackingNumber)
	{
		$response = self::getClient()->get('last_checkpoint/'.$courier.'/'.$trackingNumber, [
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