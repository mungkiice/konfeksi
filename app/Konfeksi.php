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
}
