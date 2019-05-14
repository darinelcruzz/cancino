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
    function getDifSaleAttribute()
    {
        $now = Goal::where('store_id', auth()->user()->store_id)->where('year', date('Y'))->where('month', date('m'))->first();
        $pastYear = Goal::where('store_id', auth()->user()->store_id)->where('year', date('Y')-1)->where('month', date('m'))->first();
        $point = $this->public - ($pastYear->sale/$now->days);
        $star = $this->public - (($pastYear->sale/$now->days) * $now->star);

        return array($point, $star);
    }
}
