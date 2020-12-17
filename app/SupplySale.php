<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplySale extends Model
{
    protected $guarded = [];

    function user()
    {
    	return $this->belongsTo(User::class);
    }

    function store()
    {
    	return $this->belongsTo(Store::class);
    }

    function movements()
    {
    	return $this->morphMany(SupplyMovement::class, 'movable');
    }

    function getStatusColorAttribute()
    {
        return ['cancelada' => 'danger', 'pendiente' => 'warning', 'pagada' => 'success'][$this->status];
    }

    function getModelNameAttribute()
    {
        return 'venta';
    }
}
