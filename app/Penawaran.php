<?php

namespace App;

class Penawaran extends Model
{
	public static function buat($pesananId, $tanggalSelesai, $biaya, $catatan, $gambar)
	{
		$penawaran = static::query()->create([
            'pesanan_id' => $pesananId,
            'tanggal_selesai' => $tanggalSelesai,
            'biaya' => $biaya,
            'catatan' => $catatan,
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
