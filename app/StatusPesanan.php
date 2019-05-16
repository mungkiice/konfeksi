<?php

namespace App;

class StatusPesanan extends Model
{
	public static function buat($pesananId, $keterangan)
	{
		$statusPesanan = static::query()->create([
			'pesanan_id' => $pesananId,
			'keterangan' => $keterangan
		]);
		return $statusPesanan;
	}
    public function pesanan()
    {
    	return $this->belongsTo(Pesanan::class);
    }
}
