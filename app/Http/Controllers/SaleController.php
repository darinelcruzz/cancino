<?php

namespace App\Http\Controllers;

use App\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    function index()
    {
        $sales = Sale::where('store_id', auth()->user()->store_id)->get();
        return view('sales.index', compact('sales'));
    }

    function create()
    {
        return view('sales.create');
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'date_sale' => 'required',
            'cash' => 'required',
            'total' => 'required',
        ]);

        Sale::create($request->all());

        return redirect(route('sales.index'));
    }

    function show(Sales $sales)
    {
        //
    }

    function edit(Sales $sales)
    {
        //
    }

    function update(Request $request, Sales $sales)
    {
        //
    }

    function deposit(Request $request)
    {
        Sale::find($request->id)->update($request->all());
        return back();
    }
}
