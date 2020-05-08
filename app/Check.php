<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    protected $guarded = [];

    function store()
    {
    	return $this->belongsTo(Store::class);
    }

    function account_movement()
    {
    	return $this->hasOne(AccountMovement::class);
    }

    function scopeFromStore($query, $store_id = null)
    {
    	return $query->where('store_id', $store_id ?? getStore()->id);
    }

    function getAmountAsTextAttribute()
    {
    	return $this->thousands(floor($this->amount));
    }

    function getDecimalsAttribute()
    {
    	$decimals = $this->amount - floor($this->amount);
    	return substr("0$decimals", -2);
    }

    function basic($number)
    {
    	$base = ['cero', 'un', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'ocho', 'nueve', 'diez',
    		'once', 'doce', 'trece', 'catorce', 'quince', 'dieciseis', 'diecisiete', 'dieciocho', 'diecinueve', 
    		'veinte', 'veintiuno', 'veintidos', 'veintitres', 'veinticuatro','veinticinco', 'veintiséis','veintisiete',
    		'veintiocho','veintinueve'];

    	return $base[intval($number)];
    }

    function tens($number)
    {
    	$tens = ['30' => 'treinta', '40' => 'cuarenta', '50' => 'cincuenta', '60' => 'sesenta',
    		'70' => 'setenta', '80' => 'ochenta', '90' => 'noventa'];

    	if($number <= 29) return $this->basic($number);

    	$ten = $number % 10;

    	if($ten == 0) {
    		return $tens[$number];
    	}
    	else return $tens[$number - $ten] . ' y '. $this->basic($ten);
    }

    function hundreds($number)
    {
    	$hundreds = ['100' => 'cien', '200' => 'doscientos', '300' => 'trecientos', '400' => 'cuatrocientos',
    		'500' => 'quinientos', '600' => 'seiscientos', '700' => 'setecientos', '800' => 'ochocientos',
    		'900 ' => 'novecientos'];

    	if($number >= 100) {
			if ($number % 100 == 0 ) {
				return $hundreds[$number];
			} else {
				$firstDigit = (int) substr($number, 0, 1);
				$tens = (int) substr($number, 1, 2);
				return (($firstDigit == 1) ? 'ciento' : $hundreds[$firstDigit * 100]) . ' ' . $this->tens($tens);
			}
		} else return $this->tens($number);
    }

    function thousands($number)
    {
        // return (int)substr($number, 0, strlen($number) - 3);
		if($number > 999) {
			if($number == 1000) {
				return 'un mil';
			} else {
				$firstDigits = (int)substr($number, 0, strlen($number) - 3);
				$hundreds = (int)substr($number,-3);

				if($firstDigits == 1) {
					$text = 'un mil '. $this->hundreds($hundreds);
				} else if($hundreds == 0) {
					$text = $this->hundreds($firstDigits) . ' mil';
				} else {
					$text = $this->hundreds($firstDigits) . ' mil ' . $this->hundreds($hundreds);
				}
				
				return $text;
			}
		} else return $this->hundreds($number);
    }
}
