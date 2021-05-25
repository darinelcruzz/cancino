<?php

namespace App\Http\Controllers;

use App\{SupplySale, SupplyMovement, Store};
use Illuminate\Http\Request;

class SupplySaleController extends Controller
{
    function index()
    {
        $pending_sales = SupplySale::where('status', '!=', 'pagada')->get();
        $paid_sales = SupplySale::where('status', 'pagada')->get();
        return view('supplies.sales.index', compact('pending_sales', 'paid_sales'));
    }

    function create()
    {
        $stores = Store::pluck('name', 'id')->toArray();
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

    function print(SupplySale $supply_sale)
    {
        return view('supplies.sales.print', compact('supply_sale'));
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

    function delivered(Store $store)
    {
        $sales = SupplySale::where('store_id', $store->id)
            ->where('status', 'entregada')
            ->with('movements')
            ->get();

        $supplies = $supplies2 = [];

        $amount = 0;

        return view('supplies.sales.delivered', compact('sales', 'store', 'supplies', 'supplies2', 'amount'));
    }

    function mark(SupplySale $supply_sale)
    {
        $supply_sale->update(['status' => 'entregada']);

        return redirect(route('supplies.sales.index'));
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

        foreach ($request->supplies as $supply) {
            $movement = SupplyMovement::find($supply['id']);
            $movement->update(['quantity' => $supply['quantity']]);
        }

        return redirect(route('supplies.sales.show', $supply_sale));
    }

    function add(SupplySale $supply_sale)
    {
        return view('supplies.sales.add', compact('supply_sale'));
    }

    function persist(Request $request, SupplySale $supply_sale)
    {
        $request->validate([
            'supplies' => 'required|array|min:1',
            'amount' => 'required',
        ]);

        // dd($request->supplies);

        $supply_sale->update($request->only('amount'));
        
        $supply_sale->movements()->createMany($request->supplies);

        return redirect(route('supplies.sales.show', $supply_sale));
    }

    function pay(Request $request, SupplySale $supply_sale)
    {
        $attributes = $request->validate([
            'invoice' => 'required',
            'sold_at' => 'required',
            'status' => 'required',
        ]);

        $supply_sale->update($attributes);

        return redirect(route('supplies.sales.index'));
    }

    function destroy(SupplySale $supply_sale)
    {
        $supply_sale->update(['status' => 'cancelada']);

        return back();
    }
}
