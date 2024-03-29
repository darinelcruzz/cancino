<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $guarded = [];

    function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }
}
