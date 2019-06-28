<?php

namespace App\Http\Controllers;

use App\{Maintenance, Store};
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    function index()
    {
        $maintenances = Maintenance::where('store_id', auth()->user()->store_id)->get();

        return view('maintenances.index', compact('maintenances'));
    }

    function create()
    {
        $stores = Store::pluck('name', 'id')->toArray();

        return view('maintenances.create', compact('stores'));
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'equipment' => 'required',
            'type' => 'required',
            'store_id' => 'required',
        ]);

        Maintenance::create($request->all());

        return redirect(route('maintenances.index'));
    }

    function show(Maintenance $maintenance)
    {
        return view('maintenances.show', compact('maintenance'));
    }

    function edit(Maintenance $maintenance)
    {
        //
    }

    function update(Request $request, Maintenance $maintenance)
    {
        //
    }

    function destroy(Maintenance $maintenance)
    {
        //
    }
}