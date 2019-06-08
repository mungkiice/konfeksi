<?php

namespace App;

class Pesan extends Model
{
	//verified
	public static function buat($userId, $pesananId, $teks)
	{
		$pesan = static::query()->create([
			'user_id' => $userId,
			'pesanan_id' => $pesananId,
			'teks' => $teks
		]);
		return $pesan;
	}

	//verified
	public function denganDataUser()
	{
		return parent::load('user');
	}

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
