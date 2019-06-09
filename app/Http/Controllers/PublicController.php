<?php

namespace App\Http\Controllers;

use App\Maintenance;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    function maintenance(Maintenance $maintenance)
    {
        return view('maintenances.public', compact('maintenance'));
    }
}
