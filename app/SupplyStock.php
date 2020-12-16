<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplyStock extends Model
{
    protected $guarded = [];

    function supply()
    {
    	return $this->belongsTo(Supply::class);
    }

    function store()
    {
    	return $this->belongsTo(Store::class);
    }
}
