<?php

namespace App\Http\Controllers;

use App\Shopping;
use App\Sale;
use App\CreditNote;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function shoppings()
    {
        $shoppings = Shopping::all();
        return view('admin.shoppings', compact('shoppings'));
    }

    function verify(Shopping $shopping)
    {
        $shopping->update(['status' => 'verificado']);
        return back();
    }

    function sales()
    {
        $dates = Sale::get(['date_sale','store_id', 'total'])->groupBy('date_sale');
        // dd($dates);
        return view('admin.sales', compact('dates'));
    }

    function creditNotes()
    {
        $creditNotes = CreditNote::all();
        return view('admin.creditnotes', compact('creditNotes'));
    }

    function edit($id)
    {
        //
    }

    function update(Request $request, $id)
    {
        //
    }

    function destroy($id)
    {
        //
    }
}
