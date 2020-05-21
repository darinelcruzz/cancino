<?php

namespace App\Http\Controllers;

use App\{Waste, Store};
use Illuminate\Http\Request;

class POSController extends Controller
{
    function show($pos)
    {
        $wastes = Waste::where('pos', $pos)->get();
        return view('pos.show', compact('wastes', 'pos'));
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
