<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = ['from', 'to', 'item', 'quantity', 'q1',
    'd1', 'q2', 'd2', 'q3', 'd3','status', 'user_id'];

    function fromr()
    {
        return $this->belongsTo(Store::class, 'from');
    }

    function tor()
    {
        return $this->belongsTo(Store::class, 'to');
    }
}
