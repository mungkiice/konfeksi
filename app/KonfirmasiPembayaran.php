<?php

namespace App;

class KonfirmasiPembayaran extends Model
{
    public function pesanan()
    {
    	return $this->belongsTo(Pesanan::class);	
    }
}
