<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Store;

class StoreController extends Controller
{
    function index()
    {
        //
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
        $this->validate($request, [
            'balance' => 'required',
        ]);
        Store::find($request->id)->update([
            'balance' => $request->balance
        ]);
        return redirect(route('admin.balances'));
    }

    function destroy(Store $store)
    {
        //
    }
}
