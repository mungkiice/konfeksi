<?php

namespace App;

class Pesanan extends Model
{
    public function komplain()
    {
    	return $this->hasOne(Komplain::class);
    }
}
