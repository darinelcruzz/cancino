<?php

namespace App\Http\Controllers;

use App\{Checkup, Store};
use Illuminate\Http\Request;

class CheckupController extends Controller
{
    function index()
    {
        $checkups = Checkup::all();

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
        ]);

        $checkup = Checkup::create($request->all() + ['store_id' => 2]);

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

        return view('checkups.report', compact('checkup', 'store'));
    }
}
