<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $guarded = [];

    function store()
    {
    	return $this->belongsTo(Store::class);
    }

    function counts()
    {
    	return $this->hasMany(Count::class);
    }
}
