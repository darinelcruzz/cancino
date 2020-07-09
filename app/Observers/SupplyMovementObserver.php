<?php

namespace App\Observers;

use App\SupplyMovement;

class SupplyMovementObserver
{
    function created(SupplyMovement $supplyMovement)
    {
        if ($supplyMovement->movable_type == 'App\SupplyPurchase') {
            $supplyMovement->supply->update(['quantity' => $supplyMovement->supply->quantity + $supplyMovement->quantity]);
        } else {
            $supplyMovement->supply->update(['quantity' => $supplyMovement->supply->quantity - $supplyMovement->quantity]);
        }
    }

    function updated(SupplyMovement $supplyMovement)
    {
        //
    }

    function deleted(SupplyMovement $supplyMovement)
    {
        //
    }

    function restored(SupplyMovement $supplyMovement)
    {
        //
    }

    function forceDeleted(SupplyMovement $supplyMovement)
    {
        //
    }
}
