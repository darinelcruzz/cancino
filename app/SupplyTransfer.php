<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplyTransfer extends Model
{
    protected $guarded = [];

    function origin()
    {
    	return $this->belongsTo(Store::class, 'transferred_from');
    }

    function destination()
    {
    	return $this->belongsTo(Store::class, 'transferred_to');
    }

    function movements()
    {
    	return $this->morphMany(SupplyMovement::class, 'movable');
    }

    function getModelNameAttribute()
    {
        return 'transferencia';
    }
}
