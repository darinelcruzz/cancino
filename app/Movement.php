<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    protected $fillable = ['employer_id', 'date', 'store_id', 'type'];
}
