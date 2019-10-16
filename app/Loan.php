<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = ['from', 'to', 'item', 'quantity', 'status', 'user_id', 'invoice_id'];

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
