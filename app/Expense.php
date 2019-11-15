<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $guarded = [];

    function store()
    {
        return $this->belongsTo(Store::class);
    }

    function scopeBalanceByStore($query, $store_id)
    {
        $expenses = $query->where('store_id', $store_id)->get();
        $balance = 0;
        foreach ($expenses as $expense) {
            $balance += $expense->type == 1 ? $expense->amount : - $expense->amount;
        }
        return $balance;
    }

    function scopeLastUpdate($query, $store_id)
    {
        $update = $query->where('store_id', $store_id)->get()->last();
        return $update;
    }


}
