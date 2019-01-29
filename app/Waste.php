<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Waste extends Model
{
    protected $fillable = [
        'item', 'description', 'store_id', 'status', 'pos', 'pos_at', 'user_id'
    ];

    function store()
    {
        return $this->belongsTo(Store::class);
    }
}
