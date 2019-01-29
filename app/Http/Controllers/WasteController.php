<?php

namespace App\Http\Controllers;

use App\Waste;
use Illuminate\Http\Request;

class WasteController extends Controller
{
    function index()
    {
        $pendings = Waste::where('store_id', auth()->user()->store_id)->where('status', 'pendiente')->get();
        $complete = Waste::where('store_id', auth()->user()->store_id)->get();
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

    function edit(Waste $waste)
    {
        //
    }

    function update(Request $request, Waste $waste)
    {
        //
    }

    function destroy(Waste $waste)
    {
        //
    }
}
