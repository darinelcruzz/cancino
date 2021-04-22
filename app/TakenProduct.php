<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TakenProduct extends Model
{
	protected $guarded = [];
	
    function user()
    {
    	return $this->belongsTo(User::class);
    }

    function store()
    {
    	return $this->belongsTo(Store::class);
    }
}
