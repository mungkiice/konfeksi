<?php

namespace App;

class Produk extends Model
{
	// verified
	public static function temukan($produkId)
	{
		$produk = static::query()->find($produkId);
		return $produk;	
	}

	//verified
	public function hapus()
	{
		parent::delete();
	}

	//verified
	public static function buat($konfeksiId, $nama, $deskripsi, $gambar, $harga)
	{
		$produk = static::query()->create([
			'konfeksi_id' => $konfeksiId,
			'nama' => $nama,
			'deskripsi' => $deskripsi,
			'gambar' => $gambar,
			'harga' => $harga
		]);
		return $produk;
	}

	public function perbarui($nama, $deskripsi, $gambar, $harga)
	{
		parent::update([
			'nama' => $nama ?: $this->nama,
			'deskripsi' => $deskripsi ?: $this->deskripsi,
			'gambar' => $gambar ?: $this->gambar,
			'harga' => $harga ?: $this->harga
		]);
	}
	
	public function konfeksi()
	{
		return $this->belongsTo(Konfeksi::class);
	}
}
