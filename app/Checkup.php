<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkup extends Model
{
    protected $guarded = [];

    protected $casts = [
    	'cash' => 'array',
    	'online' => 'array',
    	'cash_sums' => 'array',
    	'transfer' => 'array',
    	'transfer_sums' => 'array',
    	'bbva' => 'array',
    	'banamex' => 'array',
    	'card_sums' => 'array',
        'notes' => 'array',
        'returns' => 'array',
        'online' => 'array',
        'clip' => 'array',
        'credit' => 'array',
        'canceled' => 'array',
        'net_pay_1' => 'array',
        'net_pay_2' => 'array',
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
        return $this->cash_sums['c'] + $this->transfer_sums['c'] + $this->card_sums['c'] + $this->creditSum - $this->canceledSum + $this->sc_dif
            + ($this->online['web']??0) + $this->retention;
    }

    function getStatusLabelAttribute()
    {
        $colors = ['warning', 'danger', 'success', 'default', 'primary'];
        $labels = ['PENDIENTE', 'ERROR', 'REVISADO', 'POS', 'EDITABLE'];

        return "<span class='label label-" . $colors[$this->status] ."' title='" . $this->error . "'>" . $labels[$this->status] . "</span>";
    }

    function getReturnsSumAttribute()
    {
        $sum = 0;

        foreach ($this->returns as $return) {
            $sum += $return['a'];
        }

        return $sum;
    }

    function getNotesSumAttribute()
    {
        return $this->notes['a'] ?? 0;
    }

    function getBbvaSumAttribute()
    {
        $sum = 0;

        foreach ((array) $this->bbva as $item) {
            $sum += $item['a'];
        }

        return $sum;
    }

    function getBanamexSumAttribute()
    {
        $sum = 0;

        foreach ((array) $this->banamex as $item) {
            $sum += $item['a'];
        }

        return $sum;
    }

    function getClipSumAttribute()
    {
        $sum = 0;

        foreach ((array) $this->clip as $item) {
            $sum += $item['a'];
        }

        return $sum;
    }

    function getCreditSumAttribute()
    {
        $sum = 0;
        if (isset($this->credit)) {
            foreach ($this->credit as $item) {
                $sum += $item['a'];
            }

            return $sum;
        }
    }

    function getCanceledSumAttribute()
    {
        $sum = 0;
        if (isset($this->canceled)) {
            foreach ($this->canceled as $item) {
                $sum += $item['a'];
            }

            return $sum;
        }
    }

}
