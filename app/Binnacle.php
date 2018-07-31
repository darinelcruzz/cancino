<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Binnacle extends Model
{
    protected $fillable = ['date', 'client_id', 'observations', 'reason', 'document', 'amount', 'user_id'];
}
