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
        return $this->next_register ? true: false;
    }

    function getNextRegisterAttribute()
    {
        return AccountMovement::where('bank_account_id', $this->bank_account_id)
            ->where('id', '>', $this->id)
            ->whereNull('updated_at')
            ->first();
    }

    function getNextRouteAttribute()
    {
        return route('account_movements.edit', $this->next_register);
    }
}
