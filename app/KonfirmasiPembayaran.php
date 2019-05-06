<?php

namespace App;

class KonfirmasiPembayaran extends Model
{
	public static function create($pesananId, $gambar)
	{
		$konfirmasiPembayaran = static::query()->create([
			'pesanan_id' => $pesananId,
			'gambar' => $gambar
		]);
		return $konfirmasiPembayaran;
	}

    public function pesanan()
    {
    	return $this->belongsTo(Pesanan::class);	
    }
}
