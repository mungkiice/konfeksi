<?php

namespace App;

class Pesanan extends Model
{
	public function statusPesanans()
	{
		return $this->hasMany(StatusPesanan::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function produk()
	{
		return $this->belongsTo(Produk::class);
	}

	public function penawaran()
	{
		return $this->hasOne(Penawaran::class);
	}
}
