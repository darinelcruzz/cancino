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

    function getIsExpiredAttribute()
    {
		if (date('Y-m-d') >= $this->invoiced_at && date('Y-m-d') <= $this->expired_at) {
			return 'pendiente';
		} else if(date('Y-m-d') > $this->expired_at) {
			return 'vencido';
		} else {
			return 'pagado';
		}
    }

    function getStatusColorAttribute()
    {
        if ($this->status != 'impreso' && $this->isExpired == 'pagado') {
            $this->update(['status' => $this->isExpired]);
        }

    	$colors = ['pendiente' => 'warning', 'pagado' => 'success', 'vencido' => 'danger', 'impreso' => 'primary'];

    	return $colors[strtolower($this->status)];
    }
}
