<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{

    function index($store)
    {
        $route = 'public/documents/' . $store;
        $files = Storage::files($route);

        return view('documents.folder', compact('files', 'route'));
    }

    function create()
    {
        return view('documents.create');
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'store' => 'required',
            'name' => 'required',
        ]);

        $route = 'public/documents/store' . $request->store;
        $request->file('doc')->storeAs($route, $request->name . '.pdf');

        return redirect(route('admin.documents'));
    }

    function show(Store $store)
    {
        //
    }

    function edit(Store $store)
    {
        //
    }

    function update(Request $request)
    {
        //
    }

    function destroy(Store $store)
    {
        //
    }
}
