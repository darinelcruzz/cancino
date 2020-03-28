<?php

namespace App\Http\Controllers;

use App\{Waste, Store};
use Illuminate\Http\Request;

class WasteController extends Controller
{
    function index()
    {
        $pendings = Waste::where('store_id', auth()->user()->store_id)->where('status', 'pendiente')->get();
        $complete = Waste::where('store_id', auth()->user()->store_id)->where('status', 'destruido')->get();
        return view('wastes.index', compact('pendings', 'complete'));
    }

    function create()
    {
        //
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'item' => 'required',
            'description' => 'required',
        ]);

        $waste = Waste::create($request->all());

        return redirect(route('wastes.index'));
    }

    function show(Waste $waste)
    {
        //
    }

    function edit(Store $store)
    {
        $wastes = Waste::where('store_id', $store->id)->where('status', 'pendiente')->get();

        return view('wastes.edit', compact('wastes', 'store'));
    }

    function update(Request $request, Waste $wastes)
    {
        $this->validate($request, [
            'pos' => 'required',
            'pos_at' => 'required',
        ]);

        foreach ($request->items as $item_id) {
            $item = Waste::find($item_id);
            $item->update($request->except('items'));
        }
        return redirect(route('admin.wastes'));
    }

    function report(Store $store)
    {
        $wastes = Waste::where('store_id', $store->id)->where('status', 'pendiente')->get();

        return view('wastes.report', compact('wastes', 'store'));
    }
}
