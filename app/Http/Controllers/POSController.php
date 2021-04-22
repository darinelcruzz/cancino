<?php

namespace App\Http\Controllers;

use App\{TakenProduct, Store};
use Illuminate\Http\Request;

class POSController extends Controller
{
    function show($pos)
    {
        $taken_products = TakenProduct::where('pos', $pos)->get();
        return view('pos.show', compact('taken_products', 'pos'));
    }

    function upload($pos)
    {
        return view('pos.upload', compact('pos'));
    }

    function save(Request $request, $pos)
    {
        $this->validate($request, [
            'photo' => 'required',
        ]);

        $route = 'public/pos';
        $extension = $request->file('photo')->getClientOriginalExtension();
        $request->file('photo')->storeAs($route, $pos . '.' . $extension);

        return redirect(route('admin.wastes'));
    }
}
