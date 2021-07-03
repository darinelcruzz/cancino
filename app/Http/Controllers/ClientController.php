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
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'contact' => 'required',
            'position' => 'required',
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
        return view('clients.edit', compact('client'));
    }

    function update(Request $request, Client $client)
    {
        $this->validate($request, [
            'business' => 'required',
            'social' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'contact' => 'required',
            'position' => 'required',
        ]);

        $client->update($request->all());

        return redirect(route('clients.index'));
    }
}
