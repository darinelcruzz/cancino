<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $fillable = ['store_id', 'month', 'year', 'past_sale', 'point', 'days', 'star', 'golden'];
}
