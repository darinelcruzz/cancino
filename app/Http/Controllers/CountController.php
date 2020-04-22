<?php

namespace App\Http\Controllers;

use App\Count;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CountsExport;

class CountController extends Controller
{
    function index()
    {
        $counts = Count::with('product', 'user', 'location')->get();
        return view('counts.index', compact('counts'));
    }

    function create()
    {
        return view('counts.create');
    }

    function store(Request $request)
    {
        $attributes = $request->validate([
            'quantity' => 'required',
            'helper_id' => 'required',
            'user_id' => 'required',
            'location_id' => 'required'
        ]);

        $count = Count::create($request->all());

        return redirect(route('count.create'))->with('status', '¡' . $count->quantity . ' de ' . $count->product->code . ' añadido(s)!');
    }

    function export()
    {
        return Excel::download(new CountsExport, 'conteos.xlsx');
    }
}
