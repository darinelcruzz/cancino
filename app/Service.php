<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
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

    function getStatusAttribute()
    {
		if (date('Y-m-d') >= $this->invoiced_at && date('Y-m-d') <= $this->expired_at) {
			return 'PENDIENTE';
		} else if(date('Y-m-d') > $this->expired_at) {
			return 'VENCIDO';
		} else {
			return 'PAGADO';
		}
    }

    function getStatusColorAttribute()
    {
    	$colors = ['pendiente' => 'warning', 'pagado' => 'success', 'vencido' => 'danger'];

    	return $colors[strtolower($this->status)];
    }
}
