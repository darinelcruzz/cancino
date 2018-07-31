<?php

namespace App\Http\Controllers;

use App\Binnacle;
use App\Client;
use Illuminate\Http\Request;

class BinnacleController extends Controller
{
    function index()
    {
        $binnacles = Binnacle::All();

        return view('binnacles.index', compact('binnacles'));
    }

    function create()
    {
        $clients = Client::pluck('business', 'id')->toArray();
        return view('binnacles.create', compact('clients'));
    }

    function store(Request $request)
    {
        //
    }

    function show(Binnacle $binnacle)
    {
        //
    }

    function edit(Binnacle $binnacle)
    {
        //
    }

    function update(Request $request, Binnacle $binnacle)
    {
        //
    }

    function destroy(Binnacle $binnacle)
    {
        //
    }
}
