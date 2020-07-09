<?php

namespace App\Http\Controllers;

use App\{SupplySale, Store};
use Illuminate\Http\Request;

class SupplySaleController extends Controller
{
    function index()
    {
        $supply_sales = SupplySale::all();
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

    function edit(SupplySale $supply_sale)
    {
        //
    }

    function update(Request $request, SupplySale $supply_sale)
    {
        //
    }

    function destroy(SupplySale $supply_sale)
    {
        //
    }
}