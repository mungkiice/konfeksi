<?php

namespace App;

class Pesan extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
