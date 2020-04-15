<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tab extends Model
{
    protected $guarded = [];

    protected $casts = [
    	'black' => 'array',
    	'star' => 'array',
    	'golden' => 'array'
    ];

    function goal()
    {
        return $this->belongsTo(Goal::class);
    }

}
