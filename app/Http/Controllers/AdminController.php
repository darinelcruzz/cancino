<?php

namespace App\Http\Controllers;

use App\Shopping;
use App\Sale;
use App\Note;
use App\Store;
use App\Binnacle;
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
        return view('admin.sales', compact('dates'));
    }

    function notes()
    {
        $notes = Note::all();
        return view('admin.notes', compact('notes'));
    }

    function balances()
    {
        $stores = Store::all();
        return view('admin.balances', compact('stores'));
    }

    function binnacles()
    {
        $activitys = Binnacle::where('status', 'realizada')->get();
        $plannings = Binnacle::where('status', 'pendiente')->get();

        return view('admin.binnacles', compact('activitys', 'plannings'));
    }
}
