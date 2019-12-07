<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    protected $guarded = [];

    function store()
    {
        return $this->belongsTo(Store::class);
    }

    function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    function payment()
    {
        return $this->hasMany(Payment::class);
    }

    function getDifferenceAttribute()
    {
        return $this->amount - $this->payment->sum('amount');
    }
}
