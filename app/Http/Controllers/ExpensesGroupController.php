<?php

namespace App\Http\Controllers;

use App\ExpensesGroup;
use Illuminate\Http\Request;

class ExpensesGroupController extends Controller
{
    function index()
    {
        //
    }

    function create()
    {
        return view('expenses_groups.create');
    }

    function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'type' => 'required'
        ]);

        ExpensesGroup::create($validated);

        return redirect(route('providers.index'));
    }

    function show(ExpensesGroup $expenses_group)
    {
        //
    }

    function edit(ExpensesGroup $expenses_group)
    {
        return view('expenses_groups.edit', compact('expenses_group'));
    }

    function update(Request $request, ExpensesGroup $expenses_group)
    {
        $validated = $request->validate([
            'name' => 'required',
            'type' => 'required'
        ]);

        $expenses_group->update($validated);

        return redirect(route('providers.index'));
    }

    function destroy(ExpensesGroup $expenses_group)
    {
        //
    }
}
