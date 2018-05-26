<?php

namespace App\Http\Controllers;

use App\CreditNote;
use Illuminate\Http\Request;

class CreditNoteController extends Controller
{
    function index()
    {
        $shoppings = Shopping::where('store_id', auth()->user()->store_id)->get();
        return view('shoppings.index', compact('shoppings'));
    }

    function create()
    {
        return view('creditnotes.create');
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'store_id' => 'required',
            'folio' => 'required',
            'amount' => 'required',
            'date_nc' => 'required',
            'items' => 'required',
        ]);

        $nc = CreditNote::create($request->all());

        if ($nc->document > 1000) {
            $nc->update(['status'=>'aplicada']);
        }

        return redirect(route('admin.creditnotes'));
    }

    function show(CreditNote $creditNote)
    {
        //
    }

    function edit(CreditNote $creditNote)
    {
        //
    }

    function update(Request $request, CreditNote $creditNote)
    {
        //
    }

    function destroy(CreditNote $creditNote)
    {
        //
    }
}
