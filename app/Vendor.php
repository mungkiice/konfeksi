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
}
