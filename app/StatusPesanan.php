<?php

namespace App;

class StatusPesanan extends Model
{
    public function pesanan()
    {
    	return $this->belongsTo(Pesanan::class);
    }
}
