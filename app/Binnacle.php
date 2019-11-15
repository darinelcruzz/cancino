<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Binnacle extends Model
{
    protected $guarded = [];

    function store()
    {
        return $this->belongsTo(Store::class);
    }

    function client()
    {
        return $this->belongsTo(Client::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }
}
