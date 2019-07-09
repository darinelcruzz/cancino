<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;
use Illuminate\Notifications\Notifiable;

class Sale extends Model
{
    use Notifiable;

    protected $fillable = ['date_sale', 'cash', 'public',
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
    
    function getScale($date, $store = NULL)
    {
        if ($store == NULL) {
            $store = auth()->user()->store_id;
        }
        $now = Goal::where('store_id', $store)->where('year', substr($date, 0, 4))->where('month', substr($date, 5))->first();
        $pastYear = Goal::where('store_id', $store)->where('year', substr($date, 0, 4) - 1)->where('month', substr($date, 5))->first();
        $point = round($pastYear->sale/$now->days, 2);
        $star = round(($pastYear->sale/$now->days) * $now->star, 2);
        $golden = round($star * $now->golden, 2);

        return array($point, $star, $golden);
    }
}
