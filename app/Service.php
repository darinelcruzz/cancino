<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Service extends Model
{
    use Notifiable;

    protected $guarded = [];

    function serviceable()
    {
    	return $this->morphTo();
    }

    function payments()
    {
    	return $this->hasMany(ServicePayment::class);
    }

    function getPeriodTextAttribute()
    {
    	return "Cada " . ($this->period == 1 ? "mes": "$this->period meses");
    }

    function getStatusColorAttribute()
    {
        $colors = ['pendiente' => 'warning', 'pagado' => 'success', 'vencido' => 'danger', 'impreso' => 'primary', 'impreso vencido' => 'danger'];

    	return $colors[strtolower($this->status)];
    }
}
