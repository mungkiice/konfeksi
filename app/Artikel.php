<?php

namespace App;

class Artikel extends Model
{
	public static function semua(array $columns = [])
	{
		$artikel = static::query()->get();
		return $artikel;
	}
}
