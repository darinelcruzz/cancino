<?php

namespace App\Http\Controllers;

use App\Shopping;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    function index()
    {
        $shoppings = Shopping::all();
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
            'reference' => 'required',
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
