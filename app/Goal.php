<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $fillable = ['store_id', 'month', 'year', 'sale', 'point', 'days', 'star', 'golden', 'total'];

    function store()
    {
        return $this->belongsTo(Store::class);
    }

    function getPointLabelAttribute()
    {
        $colors = ['rojo' => '#C81D11', 'negro' => '#000000', 'estrella' => '#008F39', 'dorada' => '#DCBF32'];
        $icons = ['rojo' => 'circle', 'negro' => 'circle', 'estrella' => 'star', 'dorada' => 'star'];
        $color = array_key_exists($this->point, $colors) ? $colors[$this->point] : 'default';
        $icon = array_key_exists($this->point, $icons) ? $icons[$this->point] : 'default';
        return "<i style='color:$color' class='fa fa-$icon'>";
    }
}
