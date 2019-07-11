<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = ['equipment_id', 'type', 'cost', 'provider', 'maintenance_at', 'observations'];

    function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }
}
