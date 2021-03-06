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
        if ($this->type == 'mercancia' || $this->type == 'varfra' || $this->type == 'no definido') {
            return 'AFSM-';
        }elseif ($this->type == 'regalias' or $this->type == 'comisión') {
            return 'AFFF-';
        }elseif ($this->type == 'nota cargo') {
            return 'ACSM-';
        }elseif ($this->type == 'pronto pago') {
            return 'ANFF-';
        }
    }

    function getStatusColorAttribute()
    {
        return ['pendiente' => 'warning', 'verificado' => 'success', 'impreso' => 'primary'][$this->status];
    }
}
