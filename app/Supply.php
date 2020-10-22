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

    function getTotalSoldAttribute()
    {
    	return $this->movements()->where('movable_type', 'App\SupplySale')->with('movable')->get()->where('movable.status', '!=', 'cancelada')->sum('quantity');
    }
}
