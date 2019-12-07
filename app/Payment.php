<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = [];

    function debt()
    {
        return $this->belongsTo(Debt::class);
    }
}
