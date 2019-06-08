<?php

namespace App;

class Artikel extends Model
{
	public static function semua(array $columns = [])
	{
		return static::query()->get();
	}

	public static function temukan($artikelId)
	{
		return static::query()->find($artikelId);
	}

	public static function buat($judul, $deskripsi, $gambar)
	{
		$artikel = static::query()->create([
			'judul' => $judul,
			'deskripsi' => $deskripsi,
			'gambar' => $gambar 
		]);
		return $artikel;
	}

	public function perbarui($judul, $deskripsi, $gambar)
	{
		parent::update([
			'judul' => $judul ?: $this->judul,
			'deskripsi' => $deskripsi ?: $this->deskripsi,
			'gambar' => $gambar ?: $this->gambar
		]);
	}

	public function hapus()
	{
		parent::delete();
	}
}
