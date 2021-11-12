<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    function index()
    {
        $labels = ['Generales', 'Todas', 'Chiapas', 'Soconusco', 'Altos', 'Galerías Tuxtla', 'Galerías Tapachula', 'Comitán'];
        $route = 'public/documents';
        $folders = Storage::directories($route);

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

        $route = '/public/documents/store' . $request->store;
        $extension = $request->file('doc')->getClientOriginalExtension();
        $request->file('doc')->storeAs($route, $request->name . '.' . $extension);

        return redirect(route('documents.index'));
    }
    
    function show($store)
    {
        $route = '/public/documents/store' . $store;
        $files = Storage::files($route);

        // dd($files);

        return view('documents.show', compact('files', 'route'));
    }
}
