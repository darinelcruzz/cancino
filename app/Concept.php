<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concept extends Model
{
    protected $guarded = [];

    function provider()
    {
    	return $this->belongsTo(Provider::class);
    }
}
