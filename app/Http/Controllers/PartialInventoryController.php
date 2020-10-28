<?php

namespace App\Http\Controllers;

use App\{Inventory, Count};
use Illuminate\Http\Request;

class PartialInventoryController extends Controller
{
    public function index()
    {
        $inventory = Inventory::all()->last();
        $products = Count::where('inventory_id', $inventory->id)->with('product')->get()->groupBy('product.code');

        $sum = $online = 0;

        return view('inventories.partials.index', compact('products', 'sum', 'online'));
    }

    public function create()
    {
        //
    }

    function store(Request $request)
    {
        //
    }

    function show(Inventory $inventory)
    {
        //
    }

    function edit(Inventory $inventory)
    {
        //
    }

    function update(Request $request, Inventory $inventory)
    {
        //
    }

    function destroy(Inventory $inventory)
    {
        //
    }
}
