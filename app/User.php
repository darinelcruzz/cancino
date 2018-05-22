<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'username', 'email', 'password', 'level', 'store_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    function store()
    {
        return $this->belongsTo(Store::class);
    }
}
