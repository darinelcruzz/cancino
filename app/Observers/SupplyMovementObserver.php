<?php

namespace App\Observers;

use App\SupplyMovement;

class SupplyMovementObserver
{
    /**
     * Handle the supply movement "created" event.
     *
     * @param  \App\SupplyMovement  $supplyMovement
     * @return void
     */
    public function created(SupplyMovement $supplyMovement)
    {
        //
    }

    /**
     * Handle the supply movement "updated" event.
     *
     * @param  \App\SupplyMovement  $supplyMovement
     * @return void
     */
    public function updated(SupplyMovement $supplyMovement)
    {
        //
    }

    /**
     * Handle the supply movement "deleted" event.
     *
     * @param  \App\SupplyMovement  $supplyMovement
     * @return void
     */
    public function deleted(SupplyMovement $supplyMovement)
    {
        //
    }

    /**
     * Handle the supply movement "restored" event.
     *
     * @param  \App\SupplyMovement  $supplyMovement
     * @return void
     */
    public function restored(SupplyMovement $supplyMovement)
    {
        //
    }

    /**
     * Handle the supply movement "force deleted" event.
     *
     * @param  \App\SupplyMovement  $supplyMovement
     * @return void
     */
    public function forceDeleted(SupplyMovement $supplyMovement)
    {
        //
    }
}
