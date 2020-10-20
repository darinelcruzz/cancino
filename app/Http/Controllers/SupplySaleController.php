<?php

namespace App\Http\Controllers;

use App\{SupplySale, Store};
use Illuminate\Http\Request;

class SupplySaleController extends Controller
{
    function index()
    {
        $supply_sales = SupplySale::where('status', 'pendiente')->get();
        return view('supplies.sales.index', compact('supply_sales'));
    }

    function create()
    {
        $stores = Store::where('type', '!=', 'c')->pluck('name', 'id')->toArray();
        return view('supplies.sales.create', compact('stores'));
    }

    function store(Request $request)
    {
        // dd($request->all());
        $attributes = $request->validate([
            'sold_at' => 'required',
            'store_id' => 'required',
            'user_id' => 'required',
            'amount' => 'required',
        ]);

        SupplySale::create($attributes);

        return redirect(route('supplies.sales.index'));
    }

    function show(SupplySale $supply_sale)
    {
        return view('supplies.sales.show', compact('supply_sale'));
    }

    function pending(Store $store)
    {
        $sales = SupplySale::where('store_id', $store->id)
            ->where('status', 'pendiente')
            ->with('movements')
            ->get();

        $supplies = $supplies2 = [];

        $amount = 0;

        return view('supplies.sales.pending', compact('sales', 'store', 'supplies', 'supplies2', 'amount'));
    }

    function edit(SupplySale $supply_sale)
    {
        return view('supplies.sales.edit', compact('supply_sale'));
    }

    function update(Request $request, SupplySale $supply_sale)
    {
        // dd($request->all());
        $request->validate([
            'supplies' => 'required|array|min:1',
            'amount' => 'required',
        ]);

        $supply_sale->update($request->only('amount'));
        
        $supply_sale->movements()->createMany($request->supplies);

        return redirect(route('supplies.sales.show', $supply_sale));
    }

    function destroy(SupplySale $supply_sale)
    {
        $supply_sale->update(['status' => 'cancelada']);

        return back();
    }
}
