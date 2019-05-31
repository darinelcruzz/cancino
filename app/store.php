<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = ['name', 'color', 'balance'];

    function getTabNameAttribute()
    {
        return str_replace(' ', '', $this->name);
    }
}
