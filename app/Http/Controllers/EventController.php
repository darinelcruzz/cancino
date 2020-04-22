<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    function index()
    {
        $pendings = Event::whereNull('end_at')->get();
        $end = Event::where('end_at', '!=', null)->get();

        return view('events.index', compact('pendings', 'end'));
    }

    function create()
    {
        return view('events.create');
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'budget' => 'required',
            'start_at' => 'required',
        ]);

        Event::create($request->all());

        return redirect(route('events.index'));
    }
}
