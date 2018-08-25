<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $fillable = ['store_id', 'month', 'year', 'past_sale', 'past_point', 'point', 'days', 'star', 'golden'];

    function store()
    {
        return $this->belongsTo(Store::class);
    }
}
