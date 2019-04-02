<?php

namespace App;

class Vendor extends Model
{
    public function ulasans()
    {
    	return $this->hasMany(Ulasan::class);
    }

    public function image()
    {
    	return $this->morphOne(File::class, 'subject');
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function produks()
    {
    	return $this->hasMany(Produk::class);
    }
}
