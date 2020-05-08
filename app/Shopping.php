<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shopping extends Model
{
    protected $guarded = [];

    function store()
    {
        return $this->belongsTo(Store::class);
    }
    function getPrefixAttribute()
    {
        if ($this->type == 'mercancia' || $this->type == 'varfra' ) {
            return 'AFSM-';
        }elseif ($this->type == 'regalias') {
            return 'AFFF-';
        }elseif ($this->type == 'cargo') {
            return 'ACSM-';
        }elseif ($this->type == 'pronto pago') {
            return 'ANFF-';
        }
    }
}
