<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherSale extends Model
{
    protected $guarded = [];

    function checkup()
    {
        return $this->belongsTo(Checkup::class);
    }


    function client()
    {
        return $this->belongsTo(Client::class);
    }
}
