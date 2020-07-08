<?php

namespace App\Observers;

use App\SupplyPurchase;

class SupplyPurchaseObserver
{
    function created(SupplyPurchase $supplyPurchase)
    {
        $supplyPurchase->movements()->createMany(request('supplies'));
    }

    function updated(SupplyPurchase $supplyPurchase)
    {
        //
    }

    function deleted(SupplyPurchase $supplyPurchase)
    {
        //
    }

    function restored(SupplyPurchase $supplyPurchase)
    {
        //
    }

    function forceDeleted(SupplyPurchase $supplyPurchase)
    {
        //
    }
}
