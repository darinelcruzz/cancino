<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpensesGroup extends Model
{
    protected $guarded = [];

    function providers()
    {
    	return $this->hasMany(Provider::class);
    }

    function getDescriptionAttribute()
    {
    	return $this->name . " (" . $this->type . ")";
    }
}
