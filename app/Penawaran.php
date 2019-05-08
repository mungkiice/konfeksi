<?php

namespace App;

class Penawaran extends Model
{
	public static function create($pesananId, $tenggatWaktu, $biaya, $deskripsi, $gambar)
	{
		$penawaran = static::query()->create([
            'pesanan_id' => $pesananId,
            'tenggat_waktu' => $tenggatWaktu,
            'biaya' => $biaya,
            'deskripsi' => $deskripsi,
            'gambar' => $gambar
		]);
		return $penawaran;
	}
    public function pesanan()
    {
    	return $this->belongsTo(Pesanan::class);
    }
}
