<?php

namespace App\Http\Controllers;

use App\{Shopping, Store, Note};
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    function index(Request $request)
    {
        $date = $request->date ? $request->date: date('Y-m');
    	if (isVKS()) {
    		$stores = Store::where('type', '!=', 'c')->get();
    		$shoppings = Shopping::whereYear('date', substr($date, 0, 4))->whereMonth('date', substr($date, 5))->get();
            $captured = [];
    		$notes = Note::whereYear('date_nc', substr($date, 0, 4))->whereMonth('date_nc', substr($date, 5))->get();
    	} else {
    		$stores = [];
        	$shoppings = Shopping::whereNull('document')->where('store_id', auth()->user()->store_id)->whereYear('date', substr($date, 0, 4))->whereMonth('date', substr($date, 5))->get();
            $captured = Shopping::whereNotNull('document')->where('store_id', auth()->user()->store_id)->whereYear('date', substr($date, 0, 4))->whereMonth('date', substr($date, 5))->get();
            $notes = 0;
    	}

        return view('shoppings.index', compact('shoppings', 'stores', 'date', 'notes', 'captured'));
    }

    function create()
    {
        return view('shoppings.create');
    }

    function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'items' => 'required|array|min:1',
            'date' => 'required',
            'store_id' => 'required',
        ]);

        foreach ($request->items as $item) {
            Shopping::create([
                'folio' => $item['folio'],
                'amount' => $item['amount'],
                'type' => $item['type'],
                'status' => $request->status,
                'store_id' => $request->store_id,
                'date' => $request->date,
                'store_id' => $request->store_id,
                'user_id' => $request->user_id,
            ]);
        }

        return redirect(route('shoppings.index'));
    }

    function show(Shopping $shopping)
    {
        //
    }

    function edit(Shopping $shopping)
    {
        // dd($shopping);
        return view('shoppings.edit', compact('shopping'));
    }

    function update(Request $request, Shopping $shopping)
    {
        // dd($request->all(), $shopping->id);
        $attributes = $request->validate([
            'document' => 'required',
            'pos' => 'nullable',
            'invoiced_at' => 'required',
            'type' => 'sometimes|required',
        ]);

        $shopping->update($attributes);

        return redirect(route('shoppings.index'));
    }

    function invoices()
    {
        $shoppings = Shopping::all();

        foreach ($shoppings as $shopping) {
            $shopping->update([
                'invoiced_at' => $shopping->date
            ]);
        }

        return 'FINALIZADO';
    }

    function verify(Request $request, Store $store)
    {
        if ($request->shoppings) {
            foreach (Shopping::find($request->shoppings) as $shopping) {
                $shopping->update([
                    'status' => $request->status
                ]);
            }
            return redirect(route('shoppings.index'));
        }

        $shoppings = Shopping::where('store_id', $store->id)->where('status', 'pendiente')->get();
        return view('shoppings.verify', compact('store', 'shoppings'));
    }


    function destroy(Shopping $shopping)
    {
        //
    }
}
