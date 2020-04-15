<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commision extends Model
{
    protected $guarded = [];

    function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}
