<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Goal;
use App\Date;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    function index()
    {
        $sales = Sale::where('store_id', auth()->user()->store_id)->whereNull('date_deposit')->get();
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

    function show()
    {
        $days = Goal::where('store_id', auth()->user()->store_id)->where('year', date('Y'))->where('month', date('m'))->first()->days;
        $pastYear = Goal::where('store_id', auth()->user()->store_id)->where('year', date('Y')-1)->where('month', date('m'))->first()->sale;
        $perDay = $pastYear/$days;
        $sales = Sale::where('store_id', auth()->user()->store_id)->get();
        $month = date('m') . '-' . date('Y');

        return view('sales.show', compact('sales', 'month', 'perDay'));
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
