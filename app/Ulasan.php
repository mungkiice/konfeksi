<?php

namespace App;

class Ulasan extends Model
{
	// verified
	public static function buat($userId, $konfeksiId, $rating, $komentar)
	{
		$ulasan = static::query()->create([
            'user_id' => $userId,
            'konfeksi_id' => $konfeksiId,
            'rating' => $rating,
            'komentar' => $komentar
		]);
		return $ulasan;
	}
	
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function konfeksi()
    {
    	return $this->belongsTo(Konfeksi::class);
    }
}
