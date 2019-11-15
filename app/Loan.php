<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $guarded = [];

    function fromr()
    {
        return $this->belongsTo(Store::class, 'from');
    }

    function tor()
    {
        return $this->belongsTo(Store::class, 'to');
    }

    function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

}
