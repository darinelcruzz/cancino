<?php

namespace App\Http\Controllers;

use App\Equipment;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    function equipment(Equipment $equipment)
    {
        return view('equipments.public', compact('equipment'));
    }
}
