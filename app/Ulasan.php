<?php

namespace App;

class Ulasan extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function vendor()
    {
    	return $this->belongsTo(Vendor::class);
    }

    public function image()
    {
    	return $this->morphOne(File::class, 'subject');
    }
}
