<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    protected $guarded = [];

    function store()
    {
        return $this->belongsTo(Store::class);
    }

    function payment()
    {
        return $this->hasMany(Payment::class);
    }

    function storeDocuments($request)
    {
    	$route = 'public/employers/' . $this->id;

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
    }
}
