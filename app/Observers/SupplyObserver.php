<?php

namespace App\Observers;

use App\Supply;

class SupplyObserver
{
    function created(Supply $supply)
    {
        $supply->stocks()->createMany([
            ['store_id' => 1],
            ['store_id' => 3]
        ]);
    }

    function updated(Supply $supply)
    {
        //
    }

    function deleted(Supply $supply)
    {
        //
    }

    function restored(Supply $supply)
    {
        //
    }

    function forceDeleted(Supply $supply)
    {
        //
    }
}
