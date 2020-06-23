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
    	$payment = ServicePayment::whereMonth('paid_at', substr($this->invoiced_at, 5, 7))->get()->last();

    	if ($payment) {
    		if ($payment->paid_at >= $this->invoiced_at && $payment->paid_at <= $this->expired_at) {
    			return 'PAGADO';
    		} else if($payment->paid_at > $this->expired_at) {
    			return 'VENCIDO';
    		} else {
    			return 'PENDIENTE';
    		}
    	}

    	return 'PAGADO';
    }

    function getStatusColorAttribute()
    {
    	$colors = ['pendiente' => 'warning', 'pagado' => 'success', 'vencido' => 'danger'];

    	return $colors[strtolower($this->status)];
    }
}
