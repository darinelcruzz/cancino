<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $guarded = [];

    function account_movements()
    {
    	return $this->hasMany(AccountMovement::class);
    }

    function pending_movements()
    {
        return $this->hasMany(AccountMovement::class)->whereNull('expenses_group_id');
    }

    function checks()
    {
        return $this->hasMany(Check::class);
    }

    function store()
    {
        return $this->belongsTo(Store::class);
    }

    function getBalanceAttribute()
    {
    	return $this->account_movements->sum(function ($item) {
    		return $item->type == 'abono' ? $item->amount : $item->amount * (-1);
    	});
    }

    function getFullNameAttribute()
    {
        return ucfirst($this->store->name);
    }
}
