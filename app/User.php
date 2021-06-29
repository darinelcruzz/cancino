<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'username', 'email', 'password', 'level', 'store_id', 'location_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    function store()
    {
        return $this->belongsTo(Store::class);
    }

    function location()
    {
        return $this->belongsTo(Location::class);
    }

    function getIsHelperAttribute()
    {
        return $this->user->store_id == 1 && $this->user->level == 5;
    }
}
