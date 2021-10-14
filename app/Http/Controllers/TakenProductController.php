<?php

namespace App\Http\Controllers;

use App\{TakenProduct, Store};
use Illuminate\Http\Request;

class TakenProductController extends Controller
{
    function index()
    {
        $pending = TakenProduct::where('store_id', auth()->user()->store_id)->whereNull('pos')->get();
        $deleted = TakenProduct::where('store_id', auth()->user()->store_id)->whereNotNull('pos')->get()->groupBy('pos');
        // dd($deleted);
        return view('taken_products.index', compact('pending', 'deleted'));
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
            'observations' => 'required',
            'taken_at' => 'required',
            'quantity' => 'required',
        ]);

        $takenProduct = TakenProduct::create($request->all());

        return redirect(route('taken_products.index'));
    }

    function edit(Store $store)
    {
        $taken_products = TakenProduct::where('store_id', $store->id)->whereNull('pos')->get();

        return view('taken_products.edit', compact('taken_products', 'store'));
    }

    function update(Request $request)
    {
        // dd($request->all());
        $data = $this->validate($request, [
            'items' => 'required',
            'pos' => 'required',
            'deleted_at' => 'required',
        ]);

        $ids = explode(",", $request->items);

        foreach (TakenProduct::find($ids) as $taken_product) {
            $taken_product->update($request->only(['pos', 'deleted_at']));
        }

        return redirect(route('helper.taken_products'));
    }

    function print(Store $store)
    {
        $chunks = TakenProduct::where('store_id', $store->id)
            ->whereNull('pos')
            ->orderBy('code')
            ->get()
            ->groupBy('code')
            ->chunk(3);

        return view('taken_products.print', compact('chunks', 'store'));
    }
}
