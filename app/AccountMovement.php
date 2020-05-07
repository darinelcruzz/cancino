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
}
