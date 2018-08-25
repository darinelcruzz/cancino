<?php

namespace App\Http\Controllers;

use App\Goal;
use App\Store;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    function index()
    {
        $goals17 = Goal::where('year', '2017')->get();
        $goals18 = Goal::where('year', '2018')->get();
        return view('goals.index', compact('goals17'));
    }

    function create()
    {
        return view('goals.create');
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'store_id' => 'required',
            'month' => 'required',
            'year' => 'required',
            'past_sale' => 'required',
            'past_point' => 'required',
        ]);

        $goal = Goal::create($request->all());

        $factors= Store::where('id', $request->store_id)->get();
        //$note->update(['star'=>'faltante']);

        return redirect(route('goals.index'));
    }

    function show(Goal $goal)
    {
        //
    }

    function edit(Goal $goal)
    {
        //
    }

    function update(Request $request, Goal $goal)
    {
        //
    }

    function destroy(Goal $goal)
    {
        //
    }
}
