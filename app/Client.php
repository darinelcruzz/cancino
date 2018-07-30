<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['social', 'rfc', 'business', 'phone', 'email', 'address', 'city',
    'contact', 'position', 'cellphone', 'store_id', 'user_id'];
}
