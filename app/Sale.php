<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;
use Illuminate\Notifications\Notifiable;

class Sale extends Model
{
    use Notifiable;

    protected $fillable = ['date_sale', 'cash', 'transfer', 'check', 'tdebit', 'tcredit', 'credit',
    'total', 'store_id', 'status', 'user_id', 'date_deposit'];

    function store()
    {
        return $this->belongsTo(Store::class);
    }

    function getDifDayAttribute()
    {
        $start = new Date(strtotime($this->date_sale));
        $day = $start->format('D');
        $end = new Date(strtotime($this->date_deposit));
        $interval = $start->diff($end);
        $interval = $interval->format('%a');

        if ($day == 'vie' && $interval < 4 ) {
            return 'green';
        }elseif($day == 'sáb' && $interval < 3 ){
            return 'green';
        }elseif($interval < 3){
            return 'green';
        }else{
            return 'red';
        }
    }
}
