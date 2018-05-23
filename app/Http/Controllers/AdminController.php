<?php

namespace App\Http\Controllers;

use App\Shopping;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function shoppings()
    {
        $shoppings = Shopping::all();
        return view('admin.shoppings', compact('shoppings'));
    }

    function verify(Shopping $shopping)
    {
        $shopping->update(['status' => 'verificado']);
        return back();
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
