<?php

namespace App\Http\Controllers;

use App\{SupplyPurchase, SupplyMovement, Provider};
use Illuminate\Http\Request;

class SupplyPurchaseController extends Controller
{
    function index()
    {
        $supply_purchases = SupplyPurchase::all();
        return view('supplies.purchases.index', compact('supply_purchases'));
    }

    function create()
    {
        $providers = Provider::pluck('social', 'id')->toArray();
        return view('supplies.purchases.create', compact('providers'));
    }

    function store(Request $request)
    {
        $attributes = $request->validate([
            'purchased_at' => 'required',
            'provider_id' => 'required',
            'user_id' => 'required',
            'amount' => 'required',
        ]);

        SupplyPurchase::create($attributes);

        return redirect(route('supplies.purchases.index'));
    }

    function show(SupplyPurchase $supply_purchase)
    {
        return view('supplies.purchases.show', compact('supply_purchase'));
    }

    function edit(SupplyPurchase $supply_purchase)
    {
        return view('supplies.purchases.edit', compact('supply_purchase'));
    }

    function update(Request $request, SupplyPurchase $supply_purchase)
    {
        // dd($request->all());
        $request->validate([
            'supplies' => 'required|array|min:1',
            'amount' => 'required',
        ]);

        $supply_purchase->update($request->only('amount'));

        foreach ($request->supplies as $supply) {
            $movement = SupplyMovement::find($supply['id']);
            $movement->update(['quantity' => $supply['quantity']]);
        }

        return redirect(route('supplies.purchases.show', $supply_purchase));
    }

    function destroy(SupplyPurchase $supply_purchase)
    {
        //
    }
}
