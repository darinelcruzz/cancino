<?php

namespace App\Http\Controllers;

use App\{Note, Store};
use Illuminate\Http\Request;

class NoteController extends Controller
{
    function index()
    {
        if (isVKS()) {
            $stores = Store::where('type', '!=', 'c')->get();
            $notes = Note::all();
        } else {
            $stores = [];
            $notes = Note::where('store_id', auth()->user()->store_id)->get();
        }

        return view('notes.index', compact('notes', 'stores'));
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

        $note = Note::create($request->all());
        if ($note->observations != null) {
            $note->update(['status'=>'faltante']);
        }
        elseif ($note->document > 1000) {
            $note->update(['status'=>'aplicada']);
        }

        return redirect(route('notes.index'));
    }

    function show(Note $note)
    {
        //
    }

    function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }

    function update(Request $request)
    {
        Note::find($request->id)->update($request->all());
        return redirect(route('notes.index'));
    }

    function capture(Note $note)
    {
        return view('notes.add', compact('note'));
    }

    function add(Request $request)
    {
        $note = Note::find($request->id);
        if(isset($_POST['complete'])){
            $note->update([
                'status' => 'aplicada',
                'document' => $request->document,
                'date_pos' => $request->date_pos,
                'observations' => $request->observations
            ]);
            return redirect(route('notes.index'));
        }else if(isset($_POST['pending'])){
            $note->update([
                'status' => 'faltante',
                'document' => $request->document,
                'date_pos' => $request->date_pos,
                'observations' => $request->observations
            ]);
            return redirect(route('notes.index'));
        }
    }

    function destroy(Note $note)
    {
        //
    }
}
