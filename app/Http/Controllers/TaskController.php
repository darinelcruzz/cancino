<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    function index()
    {
        $tasks = Task::where('store_id', auth()->user()->store_id)->get();
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
        if (auth()->user()->store_id == 1) {
            return redirect(route('admin.tasks'));
        }
        return redirect(route('tasks.index'));
    }

    function show(Task $task)
    {
        //
    }

    function edit(Task $task)
    {
        //
    }

    function update(Request $request, Task $task)
    {
        //
    }

    function agree(Task $task)
    {
        if ($task->status == 'pendiente') {
            $task->update(['status' => 'visto']);
        }elseif ($task->status == 'visto') {
            $task->update(['status' => 'en proceso']);
        }elseif ($task->status == 'en proceso') {
            $task->update([
                'status' => 'finalizada',
                'end_at' => date('Y-m-d')
            ]);
        }
        return redirect(route('admin.tasks'));
    }

    function destroy(Task $task)
    {
        //
    }
}
