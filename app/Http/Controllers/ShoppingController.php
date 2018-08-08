<?php

namespace App\Http\Controllers;

use App\Shopping;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    function index()
    {
        if (auth()->user()->username == 'cynthia') {
            $store = 2;
        }else {
            $store = auth()->user()->store_id;
        }
        $shoppings = Shopping::where('store_id', $store)->get();
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

    function edit(Shopping $shopping)
    {
        //
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
