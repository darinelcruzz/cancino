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

    function getRestAttribute()
    {
        return $this->quantity - $this->q1 - $this->q2 - $this->q3;
    }

    function getLastQAttribute()
    {
        if ($this->q3) {
            return $this->q3;
        }elseif ($this->q2) {
            return $this->q2;
        }else {
            return $this->q1;
        }
    }
}
