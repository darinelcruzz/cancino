<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SupplyMovement;
use App\SupplySale;
use App\Store;

class SupplyInvoiceController extends Controller
{
    function index()
    {
        //
    }

    function create(Store $store, $family)
    {
        $sales = SupplySale::where('store_id', $store->id)
            ->where('status', 'entregada')
            ->pluck('id');

        $movements = SupplyMovement::where('movable_type', 'App\SupplySale')
            ->whereIn('movable_id', $sales)
            ->where('folio', null)
            ->whereHas('supply', function ($query) use ($family) {
                $query->where('family', $family);
            })
            ->with('supply')
            ->get();

        return view('supplies.invoices.create', compact('movements', 'family', 'store'));
    }

    function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'folio' => 'required',
            'invoiced_at' => 'required',
            'items' => 'required|array|min:1',
        ]);

        foreach ($request->items as $item) {
            $movement = SupplyMovement::find($item['id']);
            $movement->update([
                'folio' => $request->folio,
                'invoiced_at' => $request->invoiced_at,
            ]);
        }

        return redirect(route('supplies.sales.delivered', $request->store_id));
    }

    function show($id)
    {
        //
    }

    function edit($id)
    {
        //
    }

    function update(Request $request, $id)
    {
        //
    }

    function destroy($id)
    {
        //
    }
}
