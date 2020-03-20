<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;
use Illuminate\Notifications\Notifiable;

class Checklist extends Model
{
    use Notifiable;

    protected $guarded = [];

    function store()
    {
        return $this->belongsTo(Store::class);
    }

    function getResultAttribute()
    {
        $result = 0;
        for ($i=1; $i < 21; $i++) {
            $result += $this->{'q' . $i};
        }
        return $result;
    }

    function getColorAttribute()
    {
        return $this->result > 13 ? ($this->result > 18 ? 'success': 'warning'): 'danger';
    }

    function getColorSpanishAttribute()
    {
        return $this->result > 13 ? ($this->result > 18 ? 'verde': 'amarillo'): 'rojo';
    }

}
