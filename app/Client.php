<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = [];

    function creditSale()
    {
        return $this->hasMany(CreditSale::class);
    }

    function getTypeAttribute()
    {
        $type = ['0' => 'Crédito', '1' =>'escuela', '2' => 'B2B', '3' => 'B2B crédito'];

        return $type[$this->type];
    }
}
