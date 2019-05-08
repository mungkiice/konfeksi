<?php

namespace App;

class Pesanan extends Model
{
	public static function create($userId, $produkId, $tenggatWaktu, $deskripsi, $fileDesain, $alamat, $jumlah)
	{
		$pesanan = static::query()->create([
			'user_id' => $userId,
			'kode_pesanan' => rand(1000000, 9999999),
			'produk_id' => $produkId,
			'tenggat_waktu' => $tenggatWaktu,
			'deskripsi' => $deskripsi,
			'file_desain' => $fileDesain,
			'alamat' => $alamat,
			'jumlah' => json_encode($jumlah)
		]);
		return $pesanan;
	}

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
