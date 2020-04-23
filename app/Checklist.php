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
        return $this->result > 13 ? ($this->result > 18 ? 'green': 'yellow'): 'red';
    }

    function getColorNotificationAttribute()
    {
        return $this->result > 13 ? ($this->result > 18 ? '✅': '❌'): '⚠️';
    }

    function reset()
    {
        for ($i = 1; $i <= 20 ; $i++) { 
            $this->update(["q$i" => 0]);
        }
    }

}
