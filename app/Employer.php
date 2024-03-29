<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;

class Employer extends Model
{
    use Notifiable;

    protected $guarded = [];

    function store()
    {
        return $this->belongsTo(Store::class);
    }

    function commision()
    {
        return $this->hasMany(Commision::class);
    }

    function payment()
    {
        return $this->hasMany(Payment::class);
    }

    function getPhotoAttribute()
    {
        if (Storage::exists('employers/' . $this->id)) {
            foreach (Storage::files('employers/' . $this->id) as $file) {
                if(str_contains($file, 'FOTO.')) {
                    return Storage::url($file);
                }
            }
            return asset('images/default-avatar.png');
        }

        return asset('images/default-avatar.png');
    }

    function getAgeAttribute()
    {
        list($year,$month,$day) = explode("-",$this->birthday);
        $yearDif  = date("Y") - $year;
        $monthDif = date("m") - $month;
        $dayDif   = date("d") - $day;

        if ($dayDif < 0 || $monthDif < 0) {
            $yearDif--;
        }

        return $yearDif;
    }

    function storeDocuments($request)
    {
    	$route = '/employers/' . $this->id;

        if ($request->file('ine')) {
        	$request->file('ine')->storeAs($route, 'INE.pdf');
        }
        if ($request->file('address_file')) {
            $request->file('address_file')->storeAs($route, 'DOMICILIO.pdf');
        }
        if ($request->file('curp')) {
            $request->file('curp')->storeAs($route, 'CURP.pdf');
        }
        if ($request->file('birth_certificate')) {
            $request->file('birth_certificate')->storeAs($route, 'ACTA.pdf');
        }
        if ($request->file('social_security_number')) {
            $request->file('social_security_number')->storeAs($route, 'SEGURO.pdf');
        }
        if ($request->file('photo')) {
            $request->file('photo')->storeAs($route, 'FOTO.' . $request->photo->extension());
        }
        if ($request->file('resignation')) {
            $request->file('resignation')->storeAs($route, 'RENUNCIA.' . $request->resignation->extension());
        }
    }
}
