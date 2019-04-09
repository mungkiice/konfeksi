<?php

namespace App;

class Produk extends Model
{
	public function konfeksi()
	{
		return $this->belongsTo(Konfeksi::class);
	}
}
