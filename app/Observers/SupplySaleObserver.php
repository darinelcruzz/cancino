<?php

namespace App\Observers;

use App\SupplySale;

class SupplySaleObserver
{
    function created(SupplySale $supplySale)
    {
        $supplySale->movements()->createMany(request('supplies'));
    }

    function updated(SupplySale $supplySale)
    {
        if ($supplySale->status == 'cancelada') {
            foreach ($supplySale->movements as $movement) {
                $quantity = $movement->supply->quantity;
                $movement->supply->update(['quantity' => $quantity + $movement->quantity]);
            }
        }
    }

    function deleted(SupplySale $supplySale)
    {
        //
    }

    function restored(SupplySale $supplySale)
    {
        //
    }

    function forceDeleted(SupplySale $supplySale)
    {
        //
    }
}
