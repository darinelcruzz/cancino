<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [];

    function serviceable()
    {
    	return $this->morphTo();
    }
}
