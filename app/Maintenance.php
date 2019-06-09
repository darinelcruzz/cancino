<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = ['store_id', 'equipment', 'type', 'name', 'provider', 'maintenance_at', 'observations'];

    function store()
    {
        return $this->belongsTo(Store::class);
    }
}
