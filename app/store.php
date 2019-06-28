<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = ['name', 'color', 'balance'];

    function getTabNameAttribute()
    {
        return str_replace(' ', '', $this->name);
    }
    function sales()
    {
        return $this->hasMany(Sale::class);
    }

    function getSalesSum($date)
    {
        return Sale::where('store_id', $this->id)
            ->whereYear('date_sale', substr($date, 0,4))
            ->whereMonth('date_sale', substr($date, 5))
            ->sum('public');
    }

    function getPoint($date)
    {
        $now = Goal::where('store_id', $this->id)->where('year', substr($date, 0, 4))->where('month', substr($date, 5))->first();
        $pastYear = Goal::where('store_id', $this->id)->where('year', substr($date, 0, 4) - 1)->where('month', substr($date, 5))->first();
        if ($pastYear == NULL) {
            return 0;
        }else {
            return $pastYear->sale;
        }
    }

    function getStar($date)
    {
        $now = Goal::where('store_id', $this->id)->where('year', substr($date, 0, 4))->where('month', substr($date, 5))->first();
        $pastYear = Goal::where('store_id', $this->id)->where('year', substr($date, 0, 4) - 1)->where('month', substr($date, 5))->first();
        if ($pastYear == NULL) {
            return 0;
        }else {
            return round($pastYear->sale * $now->star, 2);
        }
    }

    function getGolden($date)
    {
        $now = Goal::where('store_id', $this->id)->where('year', substr($date, 0, 4))->where('month', substr($date, 5))->first();
        $pastYear = Goal::where('store_id', $this->id)->where('year', substr($date, 0, 4) - 1)->where('month', substr($date, 5))->first();
        if ($pastYear == NULL) {
            return 0;
        }else {
            $star = round($pastYear->sale * $now->star, 2);
            return round($star * $now->golden, 2);
        }
    }
}
