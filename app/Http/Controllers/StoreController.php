<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\{Store, User};

class StoreController extends Controller
{
    function index()
    {
        $stores = Store::with('bank_accounts')->get();
        return view('stores.index', compact('stores'));
    }

    function create()
    {
        $managers = User::where('level', 4)->orWhere('level', 1)->pluck('name', 'id')->toArray();
        
        return view('stores.create', compact('managers'));
    }

    function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'rfc' => 'required',
            'social' => 'required',
            'color' => 'required',
            'type' => 'required',
            'star' => 'required',
            'golden' => 'required',
            'account' => 'required',
            'cash' => 'required',
            'expense' => 'required',
            'salary' => 'required',
            'manager' => 'required',
        ]);

        $store = Store::create($attributes);

        $store->bank_accounts()->create([
            'type' => 'principal',
            'number' => $request->account,
        ]);

        return redirect(route('stores.index'));
    }

    function show(Store $store)
    {
        //
    }

    function edit(Store $store)
    {
        //
    }

    function update(Request $request)
    {
        //
    }

    function destroy(Store $store)
    {
        //
    }
}
