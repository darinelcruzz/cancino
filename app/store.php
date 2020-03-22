<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $guarded = [];

    function getTabNameAttribute()
    {
        return str_replace(' ', '_', $this->name);
    }

    function sales()
    {
        return $this->hasMany(Sale::class);
    }

    function managerr()
    {
        return $this->belongsTo(User::class, 'manager');
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
            return round($pastYear->sale * ($now != null ? $now->star: 1) , 2);
        }
    }

    function getGolden($date)
    {
        $now = Goal::where('store_id', $this->id)->where('year', substr($date, 0, 4))->where('month', substr($date, 5))->first();
        $pastYear = Goal::where('store_id', $this->id)->where('year', substr($date, 0, 4) - 1)->where('month', substr($date, 5))->first();
        if ($pastYear == NULL) {
            return 0;
        }else {
            $star = round($pastYear->sale * ($now != null ? $now->star: 1), 2);
            return round($star * ($now != null ? $now->golden: 1), 2);
        }
    }
}
