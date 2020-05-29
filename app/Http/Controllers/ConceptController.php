<?php

namespace App\Http\Controllers;

use App\{Concept, Provider};
use Illuminate\Http\Request;

class ConceptController extends Controller
{
    function index()
    {
        $concepts = Concept::all();
        return view('concepts.index', compact('concepts'));
    }

    function create()
    {
        $providers = Provider::all()->pluck('name', 'id')->toArray();
        return view('concepts.create', compact('providers'));
    }

    function store(Request $request)
    {
        $validated = $request->validate([
            'provider_id' => 'required',
            'description' => 'required',
        ]);

        Concept::create($validated);

        return redirect(route('concepts.index'));
    }

    function show(Concept $concept)
    {
        //
    }

    function edit(Concept $concept)
    {
        $providers = Provider::pluck('social', 'id')->toArray();
        return view('concepts.edit', compact('providers'));
    }

    function update(Request $request, Concept $concept)
    {
        $validated = $request->validate([
            'provider_id' => 'required',
            'description' => 'required',
        ]);

        $concept->updated($validated);

        return redirect(route('concepts.index'));
    }

    function destroy(Concept $concept)
    {
        //
    }
}
