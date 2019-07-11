<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $fillable = ['name', 'store_id', 'brand', 'type', 'months', 'observations'];

    function store()
    {
        return $this->belongsTo(Store::class);
    }
}
