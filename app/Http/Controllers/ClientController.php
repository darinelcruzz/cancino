<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    function index()
    {
        $clients = Client::All();

        return view('clients.index', compact('clients'));
    }

    function create()
    {
        return view('clients.create');
    }

    function store(Request $request)
    {
        //
    }

    function show(Client $client)
    {
        //
    }

    function edit(Client $client)
    {
        //
    }

    function update(Request $request, Client $client)
    {
        //
    }

    function destroy(Client $client)
    {
        //
    }
}
