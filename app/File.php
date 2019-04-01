<?php

namespace App;

class File extends Model
{
    public function subject()
    {
    	return $this->morphTo();
    }
}
