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

    function update(Request $request)
    {
        $data = $this->validate($request, [
            'items' => 'required',
            'pos' => 'required',
            'pos_at' => 'required',
            'status' => 'required',
        ]);

        foreach (Waste::find($request->items) as $waste) {
            $waste->update($request->only(['pos', 'pos_at', 'status']));
        }

        return redirect(route('admin.wastes'));
    }

    function report(Store $store)
    {
        $wastes = Waste::where('store_id', $store->id)->where('status', 'pendiente')->get();

        return view('wastes.report', compact('wastes', 'store'));
    }
}
