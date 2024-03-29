<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $guarded = [];

    function store()
    {
        return $this->belongsTo(Store::class);
    }

    function maintenance()
    {
        return $this->hasMany(Maintenance::class);
    }

    function getLastMaintenanceAttribute()
    {
        return Maintenance::where('equipment_id', $this->id)->get()->last();
    }
}
