<?php

namespace App\Http\Controllers;

use App\{Provider, ExpensesGroup};
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index()
    {
        $providers = Provider::all();
        $expenses_groups = ExpensesGroup::all();
        return view('providers.index', compact('providers', 'expenses_groups'));
    }

    function create()
    {
        $expenses_groups = ExpensesGroup::all()->pluck('description', 'id')->toArray();
        return view('providers.create', compact('expenses_groups'));
    }

    function store(Request $request)
    {
        $validated = $request->validate([
            'expenses_group_id' => 'required',
            'vks' => 'required',
            'social' => 'required',
            'business' => 'required',
        ]);

        Provider::create($validated + ['phone' => '0']);

        return redirect(route('providers.index'));
    }

    function show(Provider $provider)
    {
        //
    }

    function edit(Provider $provider)
    {
        $expenses_groups = ExpensesGroup::all()->pluck('description', 'id')->toArray();
        return view('providers.edit', compact('provider', 'expenses_groups'));
    }

    function update(Request $request, Provider $provider)
    {
        $validated = $request->validate([
            'expenses_group_id' => 'required',
            'social' => 'required',
            'business' => 'required',
            'vks' => 'required',
        ]);

        $provider->update($validated + ['phone' => '0']);

        return redirect(route('providers.index'));
    }

    function destroy(Provider $provider)
    {
        //
    }
}
