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
        $inventory = Inventory::all()->last();
        if (isAdmin()) {
            $counts = Count::where('inventory_id', $inventory->id)->get();
        }else {
            $counts = Count::where('user_id', auth()->user()->id)->where('inventory_id', $inventory->id)->get();
        }

        return view('counts.index', compact('counts'));
    }

    function create($mode = 'normal')
    {
        $locations = Location::all()->pluck('name', 'id')->toArray();
        $inventory = Inventory::all()->last();
        $counts = Count::where('user_id', auth()->user()->id)->where('inventory_id', $inventory->id)->orderBy('id', 'desc')->take(5)->get();

        return view('counts.create', compact('locations', 'mode', 'inventory', 'counts'));
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

            $counts = Count::latest()->take(5)->get();

            $message = 'Últimos añadidos: <br>';

            foreach ($counts as $count) {
                $message .= "{$count->product->code}<br>";
            }

            return redirect(route('count.create', 'codigo-de-barras'))
                ->with('status', $message);
        }

        return back()->with('status', 'ARTÍCULO NO ENCONTRADO');
    }

    function export()
    {
        return Excel::download(new CountsExport, 'conteos.xlsx');
    }
}
