<?php

namespace App\Observers;

use App\SupplyTransfer;

class SupplyTransferObserver
{
    function created(SupplyTransfer $supplyTransfer)
    {
        $supplyTransfer->movements()->createMany(request('supplies'));
    }

    function updated(SupplyTransfer $supplyTransfer)
    {
        //
    }

    function deleted(SupplyTransfer $supplyTransfer)
    {
        //
    }

    function restored(SupplyTransfer $supplyTransfer)
    {
        //
    }

    function forceDeleted(SupplyTransfer $supplyTransfer)
    {
        //
    }
}
