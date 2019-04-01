<?php

namespace App;

class Vendor extends Model
{
    public function ulasans()
    {
    	return $this->hasMany(Ulasan::class);
    }
}
