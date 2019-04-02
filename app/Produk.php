<?php

namespace App;

class Produk extends Model
{
    public function images()
    {
    	return $this->morphMany(File::class, 'subject');
    }
}
