<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditSale extends Model
{
    protected $guarded = [];

    function checkup()
    {
        return $this->belongsTo(Checkup::class);
    }
}
