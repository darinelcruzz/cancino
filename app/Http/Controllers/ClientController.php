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
        $this->validate($request, [
            'business' => 'required',
            'social' => 'required',
            'rfc' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'contact' => 'required',
            'position' => 'required',
            'store_id' => 'required',
        ]);

        Client::create($request->all());

        return redirect(route('clients.index'));
    }

    function show(Client $client)
    {
        return view('clients.show', compact('client'));
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
