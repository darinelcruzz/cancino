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
        $extension = $request->file('doc')->getClientOriginalExtension();
        $request->file('doc')->storeAs($route, $request->name . '.' . $extension);

        return redirect(route('admin.documents'));
    }
}
