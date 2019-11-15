<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;
use Illuminate\Notifications\Notifiable;

class Sale extends Model
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

    function checkup()
    {
        return $this->belongsTo(Checkup::class);
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

    function getScale($date, $store = NULL)
    {
        if ($store == NULL) {
            $store = auth()->user()->store_id;
        }
        $now = Goal::where('store_id', $store)->where('year', substr($date, 0, 4))->where('month', substr($date, 5))->first();
        $pastYear = Goal::where('store_id', $store)->where('year', substr($date, 0, 4) - 1)->where('month', substr($date, 5))->first();
        $point = $now == null ? 1 : round($pastYear->sale/$now->days, 2);
        $star = $now == null ? 1 : round(($pastYear->sale/$now->days) * $now->star, 2);
        $golden = $now == null ? 1 : round($star * $now->golden, 2);

        return array($point, $star, $golden);
    }
}
