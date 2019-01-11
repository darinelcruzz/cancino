<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['folio', 'amount', 'date', 'from', 'to', 'status', 'pos', 'pos_at', 'payed_at'];

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
