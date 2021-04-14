<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $guarded = [];

    function getModelInitialAttribute()
    {
    	return "H$this->id";
    }

    function getModelAndNameAttribute()
    {
        return "$this->name - Vivienda";
    }
}
