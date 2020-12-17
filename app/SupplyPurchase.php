<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplyPurchase extends Model
{
    protected $guarded = [];

    function user()
    {
    	return $this->belongsTo(User::class);
    }

    function provider()
    {
    	return $this->belongsTo(Provider::class);
    }

    function movements()
    {
    	return $this->morphMany(SupplyMovement::class, 'movable');
    }

    function getModelNameAttribute()
    {
        return 'compra';
    }
}
