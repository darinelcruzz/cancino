<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountMovement extends Model
{
    protected $guarded = [];

    function bank_account()
    {
    	return $this->belongsTo(BankAccount::class);
    }

    function check()
    {
    	return $this->belongsTo(Check::class);
    }

    function expenses_group()
    {
    	return $this->belongsTo(ExpensesGroup::class);
    }

    function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    function getNextRegisterExistsAttribute()
    {
        return AccountMovement::find($this->id + 1) ? true: false;
    }

    function getNextRouteAttribute()
    {
        return route('account_movements.edit', $this->id + 1);
    }
}
