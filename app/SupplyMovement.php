<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplyMovement extends Model
{
    protected $guarded = [];

    function supply()
    {
    	return $this->belongsTo(Supply::class);
    }

    function movable()
    {
    	return $this->morphTo();
    }

    function getOriginAttribute()
    {
    	if ($this->movable_type == 'App\SupplyTransfer') {
            return $this->movable->origin;
        }

        if ($this->movable_type == 'App\SupplySale') {
            return Store::find(1);
        }

        return $this->movable->store ?? Store::find(1);
    }

    function getDestinationAttribute()
    {
    	if ($this->movable_type == 'App\SupplyTransfer' || $this->movable_type == 'App\SupplySale') {
            return $this->movable->destination ?? $this->movable->store;
        }

        return Store::find(1);
    }

    function getTypeAttribute()
    {
        return $this->movable->modelName;
    }
}
