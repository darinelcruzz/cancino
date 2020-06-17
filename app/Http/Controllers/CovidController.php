<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Employer, Store, Movement, User};

class CovidController extends Controller
{
    function imss()
    {
        if (auth()->user()->level > 4) {
            $employers = Employer::where('status', '!=', 'inactivo')
            ->where('store_id', auth()->user()->store_id)
            ->get();
        }else {
            $employers = Employer::where('status', '!=', 'inactivo')
            ->get();
        }

        return view('covid.imss', compact('employers'));
    }
}
