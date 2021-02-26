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

    function goals()
    {
        return $this->hasMany(Goal::class);
    }

    function services()
    {
        return $this->morphMany(Service::class, 'serviceable');
    }

    function managerr()
    {
        return $this->belongsTo(User::class, 'manager');
    }

    function bank_accounts()
    {
        return $this->hasMany(BankAccount::class);
    }

    function getExpensesAccountAttribute()
    {
        return $this->bank_accounts->where('type', 'gastos')->first();
    }

    function getTerminalAccountAttribute()
    {
        return $this->bank_accounts->where('type', 'terminal')->first();
    }

    function getSalesSum($date)
    {
        return Sale::where('store_id', $this->id)
            ->whereYear('date_sale', substr($date, 0,4))
            ->whereMonth('date_sale', substr($date, 5))
            ->with('checkup:id,notes')
            ->get()
            ->sum(function ($sale) {
                return ($sale->public + ($sale->checkup->notes != null ? $sale->checkup->notes['a']/1.16: 0));
            });
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
