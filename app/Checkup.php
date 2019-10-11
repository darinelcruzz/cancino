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

    function getAmountAttribute()
    {
        return $this->cash_sums['c'] + $this->transfer_sums['c'] + $this->card_sums['c'];
    }
}
