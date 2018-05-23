<?php

namespace App\Http\Controllers;

use App\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
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
        //
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

    function destroy(Sales $sales)
    {
        //
    }
}
