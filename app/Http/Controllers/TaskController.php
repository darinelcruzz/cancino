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

    function show(Task $tasks)
    {
        //
    }

    function edit(Task $tasks)
    {
        //
    }

    function update(Request $request, Task $tasks)
    {
        //
    }

    function agree(Task $tasks)
    {
        if ($loan->status == 'pendiente') {
            $loan->update(['status' => 'visto']);
        }elseif ($loan->status == 'visto') {
            $loan->update(['status' => 'en proceso']);
        }elseif ($loan->status == 'en proceso') {
            $loan->update(['status' => 'finalizada']);
        }
        return redirect(route('admin.tasks'));
    }

    function destroy(Task $tasks)
    {
        //
    }
}
