<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicePayment extends Model
{
    protected $guarded = [];

    function service()
    {
    	return $this->belongsTo(Service::class);
    }
}
