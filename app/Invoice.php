<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $guarded = [];

    function invoice()
    {
        return $this->hasMany(Loan::class);
    }

    function fromr()
    {
        return $this->belongsTo(Store::class, 'from');
    }

    function tor()
    {
        return $this->belongsTo(Store::class, 'to');
    }

}
