<?php

namespace App;

class JenisKain extends Model
{
    public function image()
    {
    	return $this->morphOne(File::class, 'subject');
    }
}
