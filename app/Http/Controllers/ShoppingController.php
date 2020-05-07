<?php

namespace App\Http\Controllers;

use App\{Shopping, Store};
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    function index(Request $request)
    {
        $date = $request->date ? $request->date: date('Y-m');
    	if (isVKS()) {
    		$stores = Store::where('type', '!=', 'c')->get();
    		$shoppings = Shopping::whereYear('date', substr($date, 0, 4))->whereMonth('date', substr($date, 5))->get();
    	} else {
    		$stores = [];
        	$shoppings = Shopping::where('store_id', auth()->user()->store_id)->whereYear('date', substr($date, 0, 4))->whereMonth('date', substr($date, 5))->get();
    	}

        return view('shoppings.index', compact('shoppings', 'stores', 'date'));
    }

    function create()
    {
        return view('shoppings.create');
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'folio' => 'required',
            'date' => 'required',
            'amount' => 'required',
            'document' => 'required',
            'type' => 'required',
        ]);

        Shopping::create($request->all());

        return redirect(route('shoppings.index'));
    }

    function show(Shopping $shopping)
    {
        //
    }

    function edit(Shopping $shopping)
    {
        //
    }

    function verify(Store $store)
    {
        $shoppings = Shopping::where('store_id', $store->id)->where('status', 'pendiente')->get();
        return view('shoppings.verify', compact('store', 'shoppings'));
    }

    function update(Request $request)
    {
        foreach (Shopping::find($request->shoppings) as $shopping) {
            $shopping->update([
                'status' => 'verificado'
            ]);
        }
        return redirect(route('shoppings.index'));
    }

    function destroy(Shopping $shopping)
    {
        //
    }
}
