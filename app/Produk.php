<?php

namespace App;

class Produk extends Model
{
	public static function temukan($produkId)
	{
		$produk = static::query()->find($produkId);
		return $produk;	
	}
	
	public function konfeksi()
	{
		return $this->belongsTo(Konfeksi::class);
	}
}
