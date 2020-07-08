<?php

namespace App\Http\Controllers;

use App\Supply;
use Illuminate\Http\Request;

class SupplyController extends Controller
{
    function index()
    {
        $supplies = Supply::all();
        return view('supplies.index', compact('supplies'));
    }

    function create()
    {
        return view('supplies.create');
    }

    function store(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required',
            'code' => 'required',
            'sat_key' => 'required',
            'quantity' => 'required',
            'unit' => 'required',
            'purchase_price' => 'required',
            'sale_price' => 'required'
        ]);

        Supply::create($validated);

        return redirect(route('supplies.index'));
    }

    function show(Supply $supply)
    {
        //
    }

    function edit(Supply $supply)
    {
        return view('supplies.edit', compact('supply'));
    }

    function update(Request $request, Supply $supply)
    {
        $validated = $request->validate([
            'description' => 'required',
            'code' => 'required',
            'sat_key' => 'required',
            'quantity' => 'required',
            'unit' => 'required',
            'purchase_price' => 'required',
            'sale_price' => 'required'
        ]);

        $supply->update($validated);

        return redirect(route('supplies.index'));
    }

    function destroy(Supply $supply)
    {
        //
    }
}
