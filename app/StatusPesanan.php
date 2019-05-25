<?php

namespace App;

class StatusPesanan extends Model
{
	public static function buat($pesananId, $keterangan)
	{
		$pesanan = Pesanan::temukan($pesananId);
		if (optional($pesanan->statusPesanans()->latest()->first())->keterangan == $keterangan) {
			return null;
		}
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
