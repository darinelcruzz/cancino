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
        //
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
