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
        //
    }

    function store(Request $request)
    {
        //
    }

    function show(Event $event)
    {
        //
    }

    function edit(Event $event)
    {
        //
    }

    function update(Request $request, Event $event)
    {
        //
    }

    function destroy(Event $event)
    {
        //
    }
}
