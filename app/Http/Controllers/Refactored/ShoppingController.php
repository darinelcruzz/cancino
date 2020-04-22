<?php

namespace App\Http\Controllers\Refactored;

use App\Http\Controllers\Controller;
use App\{Shopping, Store};

class ShoppingController extends Controller
{
	function index()
    {
    	if (isAdmin()) {
    		$stores = Store::where('type', '!=', 'c')->get();
    		$shoppings = Shopping::all();
    	} else {
    		$stores = [];
        	$shoppings = Shopping::where('store_id', auth()->user()->store_id)->get();
    	}
        
        return view('shoppings.index', compact('shoppings', 'stores'));
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

    function verify(Store $store)
    {
        $shoppings = Shopping::where('store_id', $store->id)->where('status', 'pendiente')->get();
        return view('shoppings.verify', compact('store', 'shoppings'));
    }
}