<?php

namespace App\Http\Controllers;

use App\{Inventory, Store};
use App\Imports\ProductsImport;
use App\Imports\ProductBarcodesImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class InventoryController extends Controller
{
    function index()
    {
        $inventories = Inventory::all();
        return view('inventories.index', compact('inventories'));
    }

    function create()
    {
        $stores = Store::where('type', '!=', 'c')->pluck('name', 'id')->toArray();
        return view('inventories.create', compact('stores'));
    }

    function store(Request $request)
    {
        $request->validate([
            'started_at' => 'required',
            'store_id' => 'required',
            // 'excel' => 'required',
        ]);

        Inventory::create($request->except('excel'));

        // Excel::import(new ProductsImport, $request->file('excel'));

        return redirect(route('inventory.index'));
    }

    function upload(Request $request)
    {

        if (!isset($request->type)) return view('inventories.upload');

        $request->validate(['excel' => 'required']);

        if ($request->type == 'product') {
            Excel::import(new ProductsImport, $request->file('excel'));
        } else {
            Excel::import(new ProductBarcodesImport, $request->file('excel'));
        }

        return redirect(route('inventory.upload'))->with('status', '¡Carga exitosa!');
    }

    function show(Inventory $inventory)
    {

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
