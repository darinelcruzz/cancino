<?php

namespace App\Http\Controllers;

use App\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    function index()
    {
        if (auth()->user()->username == 'cynthia') {
            $store = 2;
        }else {
            $store = auth()->user()->store_id;
        }
        $sales = Sale::where('store_id', $store)->get();
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
            'public' => 'required',
            'store_id' => 'required',
        ]);

        $sale = Sale::create($request->all());

        $sale->notify(new \App\Notifications\SaleDay());

        return redirect(route('admin.sales'));
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
