<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    function index()
    {
        $notes = Note::where('store_id', auth()->user()->store_id)->get();
        return view('notes.index', compact('notes'));
    }

    function create()
    {
        return view('notes.create');
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

        $nc = Note::create($request->all());

        if ($nc->document > 1000) {
            $nc->update(['status'=>'aplicada']);
        }

        return redirect(route('admin.notes'));
    }

    function show(Note $note)
    {
        //
    }

    function edit(Note $note)
    {
        //
    }

    function update(Request $request, Note $note)
    {
        //
    }

    function destroy(Note $note)
    {
        //
    }
}
