<?php

namespace App;

class Ulasan extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function konfeksi()
    {
    	return $this->belongsTo(Konfeksi::class);
    }

    public function image()
    {
    	return $this->morphOne(File::class, 'subject');
    }
}
