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

        $note = Note::create($request->all());
        if ($note->observations != null) {
            $note->update(['status'=>'faltante']);
        }
        elseif ($note->document > 1000) {
            $note->update(['status'=>'aplicada']);
        }

        return redirect(route('admin.notes'));
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
        return redirect(route('admin.notes'));
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
            return redirect(route('admin.notes'));
        }else if(isset($_POST['pending'])){
            $note->update([
                'status' => 'faltante',
                'document' => $request->document,
                'date_pos' => $request->date_pos,
                'observations' => $request->observations
            ]);
            return redirect(route('admin.notes'));
        }
    }

    function destroy(Note $note)
    {
        //
    }
}
