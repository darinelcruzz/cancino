<?php

namespace App\Observers;

use App\Check;

class CheckObserver
{
    function created(Check $check)
    {
        $check->account_movement()->create([
            'added_at' => $check->emitted_at,
            'concept' => 'Cheque pagado',
            'type' => 'cargo',
            'amount' => $check->amount,
            'expenses_group_id' => request('expenses_group_id'),
            'bank_account_id' => $check->bank_account_id,
            'provider_id' => request('provider_id'),
        ]);
    }

    function updated(Check $check)
    {
        //
    }

    function deleted(Check $check)
    {
        //
    }

    function restored(Check $check)
    {
        //
    }

    function forceDeleted(Check $check)
    {
        //
    }
}
