<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Task extends Model
{
    use Notifiable;

    protected $guarded = [];

    function store()
    {
        return $this->belongsTo(Store::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function getLabelAttribute()
    {
        $label = ['pendiente' => 'danger', 'visto' => 'info', 'en proceso' => 'warning', 'finalizada' => 'success'];

        return "<span class='label label-" . $label[$this->status] ."'>" . strtoupper($this->status) . "</span>";
    }
}
