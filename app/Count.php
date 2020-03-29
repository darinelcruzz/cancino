<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Count extends Model
{
    protected $guarded = [];

    function user()
    {
    	return $this->belongsTo(User::class);
    }

    function helper()
    {
    	return $this->belongsTo(Helper::class);
    }

    function location()
    {
    	return $this->belongsTo(Location::class);
    }

    function product()
    {
    	return $this->belongsTo(Product::class);
    }
}
