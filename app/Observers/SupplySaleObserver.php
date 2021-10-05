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
                $origin = $movement->supply->stocks()->where('store_id', $movement->origin->id)->first();
                $origin->update(['quantity' => $origin->quantity + $movement->quantity]);
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
