<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    protected $fillable = ['name', 'store_id', 'address', 'birthday', 'ingress', 'job', 'status',
    'skills', 'weaknesses', 'married', 'sons', 'salary', 'ranking'];

    function store()
    {
        return $this->belongsTo(Store::class);
    }
}
