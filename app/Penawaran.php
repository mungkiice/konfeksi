<?php

namespace App;

class Penawaran extends Model
{
	public static function buat($pesananId, $tenggatWaktu, $biaya, $deskripsi, $gambar)
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

    public static function temukan($penawaranId)
    {
        $penawaran = static::query()->find($penawaranId);
        return $penawaran;
    }

    public function perbarui($status)
    {
        parent::update([
            'status' => $status
        ]);
    }

    public function pesanan()
    {
    	return $this->belongsTo(Pesanan::class);
    }
}
