<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    function index()
    {
        // $tasks = Task::where('store_id', auth()->user()->store_id)->get();
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    function create()
    {
        return view('tasks.create');
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
            'level' => 'required',
            'store_id' => 'required',
            'start_at' => 'required',
            'description' => 'required',
        ]);

        $task = Task::create($request->all());

        $task->notify(new \App\Notifications\TaskCreated());

        return redirect(route('tasks.index'));
    }

    function show(Tasks $tasks)
    {
        //
    }

    function edit(Tasks $tasks)
    {
        //
    }

    function update(Request $request, Tasks $tasks)
    {
        //
    }

    function destroy(Tasks $tasks)
    {
        //
    }
}
