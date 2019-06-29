<?php

namespace App\Http\Controllers;

use App\Shopping;
use App\Store;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    function index()
    {
        $shoppings = Shopping::where('store_id', auth()->user()->store_id)->get();
        return view('shoppings.index', compact('shoppings'));
    }

    function create()
    {
        return view('shoppings.create');
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'folio' => 'required',
            'date' => 'required',
            'amount' => 'required',
            'document' => 'required',
            'type' => 'required',
        ]);

        Shopping::create($request->all());

        return redirect(route('shoppings.index'));
    }

    function show(Shopping $shopping)
    {
        //
    }

    function verify(Store $store)
    {
        $shoppings = Shopping::where('store_id', $store->id)->where('status', 'pendiente')->get();
        return view('shoppings.verify', compact('store', 'shoppings'));
    }

    function update(Request $request, Shopping $shopping)
    {
        //
    }

    function destroy(Shopping $shopping)
    {
        //
    }
}
