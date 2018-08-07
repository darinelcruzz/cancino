<?php

namespace App\Http\Controllers;

use App\Goal;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    function index()
    {
        //
    }

    function create()
    {
        return view('goals.create');
    }

    function store(Request $request)
    {
        dd($request->month);
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
