<?php

namespace App;

class Pesanan extends Model
{
	public static function buat($userId, $produkId, $tenggatWaktu, $deskripsi, $fileDesain, $alamat, $jumlah, $kurir, $nomorResi)
	{
		$pesanan = static::query()->create([
			'user_id' => $userId,
			'kode_pesanan' => rand(1000000, 9999999),
			'produk_id' => $produkId,
			'tenggat_waktu' => $tenggatWaktu,
			'deskripsi' => $deskripsi,
			'file_desain' => $fileDesain,
			'alamat' => $alamat,
			'kurir' => $kurir,
			'nomor_resi' => $nomorResi,
			'jumlah' => json_encode($jumlah)
		]);
		return $pesanan;
	}

	public static function temukan($pesananId)
	{
		$pesanan = static::query()->find($pesananId);
		return $pesanan;
	}

	public static function filter($kodePesanan)
	{
		$pesanan = static::query()->where('kode_pesanan', $kodePesanan)->get();
		return $pesanan;
	}

	public function perbarui($biaya, $tenggatWaktu, $deskripsi)
	{
		parent::update([
			'biaya' => $biaya,
			'tenggat_waktu' => $tenggatWaktu,
			'deskripsi' => $deskripsi
		]);
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
