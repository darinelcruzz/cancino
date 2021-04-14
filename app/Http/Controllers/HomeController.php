<?php

namespace App\Http\Controllers;

use App\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        $homes = Home::all();
        return view('homes.index', compact('homes'));
    }

    function create()
    {
        return view('homes.create');
    }

    function store(Request $request)
    {
        Home::create($request->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'postcode' => 'required',
        ]));

        return redirect(route('homes.index'));
    }

    function show(Home $home)
    {
        //
    }

    function edit(Home $home)
    {
        return view('homes.edit', compact('home'));
    }

    function update(Request $request, Home $home)
    {
        $home->update($request->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'postcode' => 'required',
        ]));

        return redirect(route('homes.index'));
    }

    function destroy(Home $home)
    {
        //
    }
}
