<?php

namespace App\Http\Controllers;

use App\{Location, User};
use Illuminate\Http\Request;

class LocationController extends Controller
{
    function index()
    {
        //
    }

    function create()
    {
        $locations = Location::all()->pluck('name', 'id')->transform(function ($item, $key) {
            return ucfirst($item);
        })->toArray();
        $users = User::where('level', '8')->orWhere('id', '2')->get();

        return view('locations.create', compact('locations', 'users'));
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        Location::create($request->all());

        return redirect(route('location.create'));
    }

    function show(Location $location)
    {
        //
    }

    function edit(Location $location)
    {
        //
    }

    function update(Request $request, Location $location)
    {
        //
    }

    function destroy(Location $location)
    {
        //
    }
}
