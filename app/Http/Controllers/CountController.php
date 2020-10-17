<?php

namespace App\Http\Controllers;

use App\{Count, Location, Product, Inventory};
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CountsExport;

class CountController extends Controller
{
    function index()
    {
        if (isAdmin()) {
            $counts = Count::with('product', 'user', 'location')->get();
        }else {
            $counts = Count::where('user_id', auth()->user()->id)->with('product', 'user', 'location')->get();
        }

        return view('counts.index', compact('counts'));
    }

    function create($mode = 'normal')
    {
        $locations = Location::all()->pluck('name', 'id')->toArray();
        $inventory = Inventory::all()->last();

        return view('counts.create', compact('locations', 'mode', 'inventory'));
    }

    function store(Request $request, $mode = 'normal')
    {
        // dd($request->all());

        $request->validate([
            'quantity' => 'required',
            'helper_id' => 'required',
            'inventory_id' => 'required',
            'user_id' => 'required',
            'product_id' => 'required',
            'team' => 'required',
            'location_id' => 'required'
        ]);

        if ($mode == 'normal') {
            $count = Count::create($request->all());
            return redirect(route('count.create', 'normal'))->with('status', '¡' . $count->quantity . ' de ' . $count->product->code . ' añadido(s)!');
        }

        

        if ($product = Product::where('barcode', $request->product_id)->first()) {
            Count::create($request->except('product_id') + ['product_id' => $product->id]);

            return redirect(route('count.create', 'codigo-de-barras'));
        }

        return back();
    }

    function export()
    {
        return Excel::download(new CountsExport, 'conteos.xlsx');
    }
}
