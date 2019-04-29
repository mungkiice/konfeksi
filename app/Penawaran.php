<?php

namespace App;

class Penawaran extends Model
{
    public function pesanan()
    {
    	return $this->belongsTo(Pesanan::class);
    }
}
