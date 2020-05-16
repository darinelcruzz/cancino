<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Store;

class StoreController extends Controller
{
    function index()
    {
        $stores = Store::with('bank_accounts')->get();
        return view('stores.index', compact('stores'));
    }

    function create()
    {
        //
    }

    function store(Request $request)
    {
        //
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
