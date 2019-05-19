<?php

namespace App;

class Pesanan extends Model
{
	public static function buat($userId, $produkId, $tanggalSelesai, $catatan, $fileDesain, $alamat, $kota, $jumlah, $kurir)
	{
		$pesanan = static::query()->create([
			'user_id' => $userId,
			'kode_pesanan' => rand(1000000, 9999999),
			'produk_id' => $produkId,
			'tanggal_selesai' => $tanggalSelesai,
			'catatan' => $catatan,
			'file_desain' => $fileDesain,
			'alamat' => $alamat,
			'kota_id' => $kota,
			'jumlah' => json_encode($jumlah),
			'kurir' => $kurir
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
		$pesanan = static::query()->where('kode_pesanan', $kodePesanan)->first();
		return $pesanan;
	}

	public function perbarui($biaya, $tanggalSelesai, $catatan, $snapToken)
	{
		parent::update([
			'biaya' => $biaya,
			'tanggal_selesai' => $tanggalSelesai,
			'catatan' => $this->catatan . '. - ' . $catatan,
			'snap_token' => $snapToken
		]);
	}

	public function isiNomorResi($nomorResi)
	{
		parent::update([
			'nomor_resi' => $nomorResi
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

	public function penawarans()
	{
		return $this->hasMany(Penawaran::class);
	}
}
