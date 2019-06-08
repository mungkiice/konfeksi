<?php

namespace App;

class Konfeksi extends Model
{
    public function ulasans()
    {
    	return $this->hasMany(Ulasan::class);
    }
    
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function produks()
    {
    	return $this->hasMany(Produk::class);
    }

    public function pesanans()
    {
        return $this->hasManyThrough(Pesanan::class, Produk::class);
    }

    // verified
    public static function buat($userId, $alamat, $kota, $deskripsi, $gambar)
    {
        $cityName = '';
        foreach (RajaOngkirAPI::daftarKota() as $city) {
            if ($city['city_id'] == $kota) {
                $cityName = $city['type'] . ' ' . $city['city_name'];
                break;
            }
        }
        $konfeksi = static::query()->create([
            'user_id' => $userId,
            'alamat' => $alamat,
            'kota' => $cityName,
            'kota_id' => $kota,
            'deskripsi' => $deskripsi,
            'gambar' => $gambar,
        ]);
        return $konfeksi;
    }

    // verified
    public static function daftarVerified()
    {
        return static::query()->where('diverifikasi', 1)->get();
    }

    // verified
    public static function semua()
    {
        return static::query()->get();
    }

    // verified
    public static function temukan($konfeksiId)
    {
        return static::query()->find($konfeksiId);   
    }

    // verified
    public function verifikasi()
    {
        $this->update(['diverifikasi' => true]);
    }
}
