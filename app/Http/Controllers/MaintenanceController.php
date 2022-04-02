<?php

namespace App\Http\Controllers;

use App\{Maintenance, Store, Equipment, Provider};
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    function index()
    {
        $maintenances = Maintenance::where('store_id', auth()->user()->store_id)->get();

        return view('maintenances.index', compact('maintenances'));
    }

    function create(Equipment $equipment)
    {
        $providers = Provider::where('expenses_group_id', 26)->pluck('business', 'id')->toArray();

        return view('maintenances.create', compact('equipment', 'providers'));
    }

    function store(Request $request)
    {

        $this->validate($request, [
            'type' => 'required',
            'provider_id' => 'required',
            'cost' => 'required',
        ]);
        // falta actualizar el status del equipo
        Maintenance::create($request->all());

        return redirect(route('admin.equipments'));
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
