<?php

namespace App\Http\Controllers;

use App\Checklist;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    function index($store)
    {
        $checklists = Checklist::where('store_id', $store)->get();

        return view('checklists.index', compact('checklists'));
    }

    function create()
    {
        return view('checklists.create');
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
            'store_id' => 'required',
            'checker' => 'required',
        ]);

        $checklist = Checklist::create($request->all());
        
        $checklist->notify(new \App\Notifications\Checklist());

        return redirect(route('checklists.index', $request->store_id));
    }

    function show(Checklist $checklist)
    {
        return view('checklists.show', compact('checklist'));
    }

    function edit(Checklist $checklist)
    {
        //
    }

    function update(Request $request, Checklist $checklist)
    {
        //
    }

    function destroy(Checklist $checklist)
    {
        //
    }
}
