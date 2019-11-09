<?php

namespace App\Http\Controllers;

use App\{Checkup, Store, Sale};
use Illuminate\Http\Request;

class CheckupController extends Controller
{
    function index()
    {
        $checkups = Checkup::where('store_id', auth()->user()->store_id)->get()->take(30);

        return view('checkups.index', compact('checkups'));
    }

    function create()
    {
        return view('checkups.create');
    }

    function store(Request $request)
    {
        $request->validate([
            'cash' => 'required',
            'public' => 'required',
        ]);

        $checkup = Checkup::create($request->except(['user_id', 'public']));

        $sale = Sale::create([
            'date_sale' => date('Y-m-d'),
            'cash' => $checkup->cash_sums['c'],
            'public' => $request->public,
            'total' => $checkup->cash_sums['c'] + $checkup->card_sums['c'] + $checkup->transfer_sums['c'],
            'user_id' => $request->user_id,
            'store_id' => $request->store_id
        ]);

        return redirect(route('checkup.index'));
    }

    function show(Checkup $checkup)
    {
        //
    }

    function edit(Checkup $checkup)
    {
        //
    }

    function update(Request $request, Checkup $checkup)
    {
        //
    }

    function destroy(Checkup $checkup)
    {
        //
    }

    function report(Checkup $checkup)
    {
        $store = Store::where('id', $checkup->store_id)->get()->first();

        if ($checkup->store_id == auth()->user()->store_id) {
            return view('checkups.report', compact('checkup', 'store'));
        }
        return redirect(route('checkup.index'));
    }
}
