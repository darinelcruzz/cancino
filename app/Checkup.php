<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkup extends Model
{
    protected $guarded = [];

    protected $casts = [
    	'cash' => 'array',
    	'cash_sums' => 'array',
    	'transfer' => 'array',
    	'transfer_sums' => 'array',
    	'bbva' => 'array',
    	'banamex' => 'array',
    	'card_sums' => 'array',
        'notes' => 'array',
        'returns' => 'array',
    ];

    function store()
    {
        return $this->belongsTo(Store::class);
    }

    function sale()
    {
        return $this->hasOne(Sale::class);
    }

    function getAmountAttribute()
    {
        return $this->cash_sums['c'] + $this->transfer_sums['c'] + $this->card_sums['c'];
    }

    function getReturnsSumAttribute()
    {
        $sum = 0;

        foreach ($this->returns as $return) {
            $sum += $return['a'];
        }

        return $sum;
    }

    function getBbvaSumAttribute()
    {
        $sum = 0;

        foreach ($this->bbva as $item) {
            $sum += $item['a'];
        }

        return $sum;
    }

    function getBanamexSumAttribute()
    {
        $sum = 0;

        foreach ($this->banamex as $item) {
            $sum += $item['a'];
        }

        return $sum;
    }

}
