<?php

namespace App\Http\Controllers;

use App\{Supply, SupplyMovement};
use Illuminate\Http\Request;

class SupplyController extends Controller
{
    function index()
    {
        $supplies = Supply::whereStatus(1)->get();
        $low_prices = Supply::whereStatus(1)->get();
        return view('supplies.index', compact('supplies', 'low_prices'));
    }

    function inventory()
    {
        $supplies = Supply::whereStatus(1)->with('stocks')->get();
        return view('supplies.inventory', compact('supplies'));
    }

    function create()
    {
        $supplies = Supply::whereNotNull('family')->get()->groupBy('family');
        $families = [];

        foreach ($supplies as $family => $value) {
            $families[$family] = $family;
        }

        // dd($families);

        return view('supplies.create', compact('families'));
    }

    function store(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required',
            'family' => 'required',
            'code' => 'required',
            'sat_key' => 'required',
            'unit' => 'required',
            'ratio' => 'required',
            'purchase_price' => 'required',
            'sale_price' => 'required'
        ]);

        Supply::create($validated);

        return redirect(route('supplies.index'));
    }

    function show(Supply $supply)
    {
        return view('supplies.show', compact('supply'));
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
            'family' => 'required',
            'sale_price' => 'required'
        ]);

        $supply->update($validated);

        return redirect(route('supplies.index'));
    }

    function add(Supply $supply)
    {
        return view('supplies.add', compact('supply'));
    }

    function save(Request $request, Supply $supply)
    {
        $validated = $request->validate([
            'byproducts' => 'required|array',
        ]);

        $supply->update($validated);

        return redirect(route('supplies.edit', $supply));
    }

    function print(Request $request)
    {
        $date = $request->date;
        $sum = 0;

        $supplies = SupplyMovement::whereHasMorph('movable', ['App\SupplySale', 'App\SupplyPurchase'], function ($query, $type) use ($date) {
            if ($type === 'App\SupplyPurchase') {
                $query->where('purchased_at', '<=', $date);
            } else {
                $query->where('sold_at', '<=', $date)
                    ->where('status', 'pagada');
            }
        })->get()->groupBy('supply_id');

        return view('supplies.print', compact('supplies', 'date', 'sum'));
    }

    function destroy(Supply $supply)
    {
        //
    }

    function migrate()
    {
        $supplies = Supply::all();

        foreach ($supplies as $supply) {
            if ($supply->stocks->count() == 0) {
                \App\SupplyStock::create(['supply_id' => $supply->id, 'store_id' => 1, 'quantity' => $supply->quantity]);
                \App\SupplyStock::create(['supply_id' => $supply->id, 'store_id' => 3, 'quantity' => 0]);
            }
        }

        return "LISTO";
    }
}
