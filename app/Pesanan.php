<?php

namespace App;

class Pesanan extends Model
{
	// verified
	public static function buat($userId, $produkId, $catatan, $fileDesain, $alamat, $kota, $arrJumlah, $kurir)
	{
		$totalBiaya = 0;
		$produk = Produk::temukan($produkId);
		foreach ((array) $arrJumlah as $ukuran => $jumlah) {
			$totalBiaya += $jumlah * $produk->harga;
		}
		if ($alamat != null) {
			$totalBiaya += RajaOngkirAPI::ongkir($produk->konfeksi->kota_id, $kota, $kurir);
		}
		$pesanan = static::query()->create([
			'user_id' => $userId,
			'kode_pesanan' => rand(1000000, 9999999),
			'produk_id' => $produkId,
			'catatan' => $catatan,
			'file_desain' => $fileDesain,
			'alamat' => $alamat,
			'biaya' => $totalBiaya,
			'kota_id' => $kota,
			'jumlah' => json_encode($arrJumlah),
			'kurir' => $kurir
		]);
		return $pesanan;
	}

	// verified
	public static function temukan($pesananId)
	{
		return static::query()->find($pesananId);
	}

	//verified
	public static function filter($kodePesanan)
	{
		return static::query()->where('kode_pesanan', $kodePesanan)->first();
	}

	//verified
	public function perbarui($biaya, $tanggalSelesai, $catatan, $snapToken)
	{
		parent::update([
			'biaya' => $this->biaya + $biaya,
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

	public function pesans()
	{
		return $this->hasMany(Pesan::class);
	}
}
