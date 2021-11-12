<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    function index()
    {
        $labels = ['Generales', 'VKS', 'Chiapas', 'Soconusco', 'Altos', 'Galerías Tuxtla', 'Galerías Tapachula', 'Comitán'];
        $route = 'documents';
        $folders = Storage::allDirectories($route);

        // dd($labels, $route, $folders);

        return view('documents.index', compact('folders', 'route', 'labels'));
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

        $route = 'documents/store' . $request->store;
        $extension = $request->file('doc')->getClientOriginalExtension();
        $request->file('doc')->storeAs($route, $request->name . '.' . $extension);

        return redirect(route('documents.index'));
    }
    
    function show($store)
    {
        $route = 'documents/store' . $store;
        $files = Storage::files($route);

        // dd($files);

        return view('documents.show', compact('files', 'route'));
    }
}
