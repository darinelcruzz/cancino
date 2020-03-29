<?php

namespace App\Http\Controllers;

use App\Count;
use Illuminate\Http\Request;

class CountController extends Controller
{
    function index()
    {
        $counts = Count::with('product', 'user', 'location')->get();
        return view('counts.index', compact('counts'));
    }

    function create()
    {
        return view('counts.create');
    }

    function store(Request $request)
    {
        $attributes = $request->validate([
            'quantity' => 'required',
            'helper_id' => 'required',
            'user_id' => 'required',
            'location_id' => 'required'
        ]);

        $count = Count::create($request->all());

        return redirect(route('count.create'))->with('status', '¡' . $count->quantity . ' de ' . $count->product->code . ' añadido(s)!');
    }

    function show(Count $count)
    {
        //
    }

    function edit(Count $count)
    {
        //
    }

    function update(Request $request, Count $count)
    {
        //
    }

    function destroy(Count $count)
    {
        //
    }
}
