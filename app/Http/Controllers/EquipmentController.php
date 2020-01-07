<?php

namespace App\Http\Controllers;

use App\{Equipment, Store};
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    function index()
    {
        $equipments = Equipment::where('store_id', auth()->user()->store_id)->get();

        return view('equipments.index', compact('equipments'));
    }

    function create()
    {
        return view('equipments.create');
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'type' => 'required',
            'store_id' => 'required',
        ]);

        Equipment::create($request->all());

        return redirect(route('equipments.index'));
    }

    function show(Equipment $equipment)
    {
        return view('equipments.show', compact('equipment'));
    }

    function edit(Equipment $equipment)
    {
        //
    }

    function update(Request $request, Equipment $equipment)
    {
        //
    }

    function destroy(Equipment $equipment)
    {
        //
    }
}
