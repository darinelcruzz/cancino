<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commision extends Model
{
    protected $guarded = [];

    function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    function goal()
    {
        return $this->belongsTo(Goal::class);
    }

    function tab()
    {
        return $this->belongsTo(Tab::class);
    }

    function getSalePointAttribute()
    {
        if($this->sale > $this->weekly_goal * $this->goal->star * $this->goal->golden) {
            return 'dorada';
        }if($this->sale > $this->weekly_goal * $this->goal->star) {
            return 'estrella';
        }if($this->sale < $this->weekly_goal) {
            return 'rojo';
        }
        return 'negro';
    }

    function getSalePointLabelAttribute()
    {
        $colors = ['rojo' => '#C81D11', 'negro' => '#000000', 'estrella' => '#008F39', 'dorada' => '#DCBF32'];
        $icons = ['rojo' => 'circle', 'negro' => 'circle', 'estrella' => 'star', 'dorada' => 'star'];
        $color = array_key_exists($this->salePoint, $colors) ? $colors[$this->salePoint] : 'default';
        $icon = array_key_exists($this->salePoint, $icons) ? $icons[$this->salePoint] : 'default';

        return "<i style='color:$color' class='fa fa-$icon'>";
    }

    function getSalesCommisionAttribute()
    {
        $multiplier = ['rojo' => 0, 'negro' => 0.005, 'estrella' => 0.01, 'dorada' => 0.015];

        return $multiplier[$this->salePoint] * $this->sale;
    }

    function label($point)
    {
        $colors = ['rojo' => '#C81D11', 'negro' => '#000000', 'estrella' => '#008F39', 'dorada' => '#DCBF32'];
        $icons = ['rojo' => 'circle', 'negro' => 'circle', 'estrella' => 'star', 'dorada' => 'star'];
        $color = array_key_exists($point, $colors) ? $colors[$point] : 'default';
        $icon = array_key_exists($point, $icons) ? $icons[$point] : 'default';

        return "<i style='color:$color' class='fa fa-$icon'></i>";
    }

    function scPoint($sum_sc)
    {
        $tab = Tab::all()->last();

        if($sum_sc > $tab->sc_golden['q']) {
            return array("$sum_sc </br>" . $this->label('dorada') . "<br>", $tab->sc_golden['a'] * $sum_sc);
        }if($sum_sc > $tab->sc_star['q']) {
            return array("$sum_sc </br>" . $this->label('estrella') . "<br>", $tab->sc_star['a'] * $sum_sc);
        }if($sum_sc > $tab->sc_black['q']) {
            return array("$sum_sc </br>" . $this->label('negro') . "<br>", $tab->sc_black['a'] * $sum_sc);
        }else {
            return array("$sum_sc </br>" . $this->label('rojo') . "<br>", 0);
        }
    }

    function extPoint($sum_ext, $sum_amount)
    {
        $tab = Tab::all()->last();

        if($sum_ext >= $tab->ext_golden['q']) {
            return array("$sum_ext </br>" . $this->label('dorada') . "</br>(" . fnumber($sum_amount) . ")</br>", $tab->ext_golden['p'] * $sum_amount);
        }if($sum_ext >= $tab->ext_star['q']) {
            return array("$sum_ext </br>" . $this->label('estrella') . "</br>(" . fnumber($sum_amount) . ")</br>", $tab->ext_star['p'] * $sum_amount);
        }if($sum_ext >= $tab->ext_black['q']) {
            return array("$sum_ext </br>" . $this->label('negro') . "</br>(" . fnumber($sum_amount) . ")</br>", $tab->ext_black['p'] * $sum_amount);
        }else {
            return array("$sum_ext </br>" . $this->label('rojo') . "</br>", 0);
        }
    }

    function managerPayment($sale, $past_goal, $goal)
    {
        if($sale > ($past_goal->sale * $goal->star * $goal->golden)) {
            return  $this->label('dorada') . "&nbsp; &nbsp; " . fnumber($sale * 0.0075);
        }if($sale > ($past_goal->sale * $goal->star)) {
            return $this->label('estrella') . "&nbsp; &nbsp; " . fnumber($sale * 0.005);
        }if($sale > $past_goal->sale) {
            return $this->label('negro') . "&nbsp; &nbsp; " . fnumber($sale * 0.0025);
        }else {
            return $this->label('rojo') . "&nbsp; &nbsp; " . fnumber(0);
        }
    }

}
