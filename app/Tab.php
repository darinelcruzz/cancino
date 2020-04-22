<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tab extends Model
{
    protected $guarded = [];

    protected $casts = [
    	'sc_black' => 'array',
        'sc_star' => 'array',
    	'sc_golden' => 'array',
    	'ext_black' => 'array',
    	'ext_star' => 'array',
    	'ext_golden' => 'array'
    ];

    function commision()
    {
        return $this->hasMany(Commision::class);
    }

}
