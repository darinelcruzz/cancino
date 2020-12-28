<?php

namespace App\Observers;

use App\SupplyMovement;

class SupplyMovementObserver
{
    function created(SupplyMovement $supplyMovement)
    {
        $destination = $supplyMovement->supply->stocks()->where('store_id', $supplyMovement->destination->id)->first();
        $origin = $supplyMovement->supply->stocks()->where('store_id', $supplyMovement->origin->id % 3 == 0 ? 3: 1)->first();
        $quantity = $origin->quantity;

        if ($supplyMovement->movable_type == 'App\SupplyPurchase') {
            $destination->update(['quantity' => $quantity + $supplyMovement->quantity]);
            $supplyMovement->supply->update(['purchase_price' => $supplyMovement->price]);
            if ($supplyMovement->price * 1.25 > $supplyMovement->supply->sale_price) {
                $supplyMovement->supply->update(['sale_price' => $supplyMovement->price * 1.25]);
            }
        } else if ($supplyMovement->movable_type == 'App\SupplySale') {
            $origin->update(['quantity' => $quantity - $supplyMovement->quantity]);
        } else if ($supplyMovement->movable_type == 'App\SupplyTransfer') {
            $destination->update(['quantity' => $destination->quantity + $supplyMovement->quantity]);
            $origin->update(['quantity' => $quantity - $supplyMovement->quantity]);
        }
    }

    function updated(SupplyMovement $supplyMovement)
    {
        $destination = $supplyMovement->supply->stocks()->where('store_id', $supplyMovement->destination->id)->first();
        $origin = $supplyMovement->supply->stocks()->where('store_id', $supplyMovement->origin->id)->first();
        $quantity = $supplyMovement->quantity - $supplyMovement->getOriginal('quantity');

        if ($supplyMovement->movable_type != 'App\SupplySale') {
            $destination->update(['quantity' => $destination->quantity + $quantity]);
        }

        if ($supplyMovement->movable_type != 'App\SupplyPurchase') {
            $origin->update(['quantity' => $origin->quantity - $quantity]);
        }
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
