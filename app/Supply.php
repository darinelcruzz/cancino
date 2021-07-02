<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    protected $guarded = [];

    function movements()
    {
    	return $this->hasMany(SupplyMovement::class);
    }

    function stocks()
    {
    	return $this->hasMany(SupplyStock::class);
    }

    function getTotalStockAttribute()
    {
        return $this->stocks->sum('quantity');
    }

    function getTotalSoldAttribute()
    {
    	return $this->movements()->where('movable_type', 'App\SupplySale')->with('movable')->get()->where('movable.status', '!=', 'cancelada')->sum('quantity');
    }

    function getTotalPurchasedAttribute()
    {
        return $this->movements()->where('movable_type', 'App\SupplyPurchase')->with('movable')->get()->where('movable.status', '!=', 'cancelada')->sum('quantity');
    }
}
