<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplyMovement extends Model
{
    protected $guarded = [];

    function supply()
    {
    	return $this->belongsTo(Supply::class);
    }

    function movable()
    {
    	return $this->morphTo();
    }
}
