<?php

namespace App;

class Komplain extends Model
{
    public function pesanan()
    {
    	return $this->belongsTo(Pesanan::class);
    }
}
