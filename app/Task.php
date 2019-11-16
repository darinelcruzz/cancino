<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    function getLabelAttribute()
    {
        $label = ['pendiente' => 'danger', 'en progreso' => 'warning', 'finalizada' => 'success'];

        return $label[$this->status];
    }
}
