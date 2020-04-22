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

    function scPoint($sum_sc)
    {
        $tab = Tab::all()->last();

        if($sum_sc > $tab->sc_golden['q']) {
            return array("$sum_sc </br> <i style='color:#DCBF32' class='fa fa-star'></i> </br>", $tab->sc_golden['a'] * $sum_sc);
        }if($sum_sc > $tab->sc_star['q']) {
            return array("$sum_sc </br> <i style='color:#008F39' class='fa fa-star'></i> </br>", $tab->sc_star['a'] * $sum_sc);
        }if($sum_sc > $tab->sc_black['q']) {
            return array("$sum_sc </br> <i style='color:#000000' class='fa fa-circle'></i> </br>", $tab->sc_black['a'] * $sum_sc);
        }else {
            return array("$sum_sc </br> <i style='color:#C81D11' class='fa fa-circle'></i> </br>", 0);
        }
    }

    function extPoint($sum_ext, $sum_amount)
    {
        $tab = Tab::all()->last();

        if($sum_ext >= $tab->ext_golden['q']) {
            return array("$sum_ext </br> <i style='color:#DCBF32' class='fa fa-star'></i> </br>(" . fnumber($sum_amount) . ")</br>", $tab->ext_golden['p'] * $sum_amount);
        }if($sum_ext >= $tab->ext_star['q']) {
            return array("$sum_ext </br> <i style='color:#008F39' class='fa fa-star'></i> </br>(" . fnumber($sum_amount) . ")</br>", $tab->ext_star['p'] * $sum_amount);
        }if($sum_ext >= $tab->ext_black['q']) {
            return array("$sum_ext </br> <i style='color:#000000' class='fa fa-circle'></i> </br>(" . fnumber($sum_amount) . ")</br>", $tab->ext_black['p'] * $sum_amount);
        }else {
            return array("$sum_ext </br> <i style='color:#C81D11' class='fa fa-circle'></i> </br>", 0);
        }
    }

    function managerPayment($sale, $past_goal, $goal)
    {
        if($sale > ($past_goal->sale * $goal->star * $goal->golden)) {
            return "<i style='color:#DCBF32' class='fa fa-star'></i> &nbsp; &nbsp; " . fnumber($sale * 0.0075);
        }if($sale > ($past_goal->sale * $goal->star)) {
            return "<i style='color:#008F39' class='fa fa-star'></i> &nbsp; &nbsp; " . fnumber($sale * 0.005);
        }if($sale > ($past_goal->sale * $goal->black)) {
            return "<i style='color:#000000' class='fa fa-circle'></i> &nbsp; &nbsp; " . fnumber($sale * 0.0025);
        }else {
            return "<i style='color:#C81D11' class='fa fa-circle'></i> &nbsp; &nbsp; " . fnumber(0);
        }
    }

}
