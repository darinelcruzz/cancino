<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    function counts()
    {
    	return $this->hasMany(Count::class);
    }

    function getDifferenceAttribute()
    {
    	return $this->counts->sum('quantity') - $this->quantity;
    }
}
