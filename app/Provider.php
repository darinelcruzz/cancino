<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $guarded = [];

    function expenses_group()
    {
    	return $this->belongsTo(ExpensesGroup::class);
    }

    function getNameAttribute()
    {
    	return strtoupper($this->social);
    }
}
