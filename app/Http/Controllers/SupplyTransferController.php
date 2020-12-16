<?php

namespace App\Http\Controllers;

use App\{SupplyTransfer, Store};
use Illuminate\Http\Request;

class SupplyTransferController extends Controller
{
    function index()
    {
        $transfers = SupplyTransfer::all();
        return view('supplies.transfers.index', compact('transfers'));
    }

    function create()
    {
        $stores = Store::where('id', 1)->orWhere('id', 3)->pluck('name', 'id')->toArray();
        return view('supplies.transfers.create', compact('stores'));
    }

    function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'transferred_at' => 'required',
            'transferred_from' => 'required',
            'transferred_to' => 'required',
            'supplies' => 'required|array|min:1',
        ]);

        SupplyTransfer::create($request->except('supplies', 'amount'));

        return redirect(route('supplies.transfers.index'));
    }

    function show(SupplyTransfer $supply_transfer)
    {
        return view('supplies.transfers.show', compact('supply_transfer'));
    }

    function edit(SupplyTransfer $supply_transfer)
    {
        return view('supplies.transfers.edit', compact('supply_transfer'));
    }

    function update(Request $request, SupplyTransfer $supply_transfer)
    {
        // dd($request->all());
        $request->validate([
            'supplies' => 'required|array|min:1',
            'amount' => 'required',
        ]);

        $supply_transfer->update($request->only('amount'));
        
        $supply_transfer->movements()->createMany($request->supplies);

        return redirect(route('supplies.transfers.show', $supply_transfer));
    }

    function destroy(SupplyTransfer $supply_transfer)
    {
        $supply_transfer->update(['status' => 'cancelada']);

        return back();
    }
}
