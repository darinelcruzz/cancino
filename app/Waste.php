<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Waste extends Model
{
    protected $guarded = [];

    function store()
    {
        return $this->belongsTo(Store::class);
    }
}
