<?php

namespace App\Http\Controllers;

use App\Checkup;
use Illuminate\Http\Request;

class CheckupController extends Controller
{
    public function index()
    {
        $checkups = Checkup::all();

        return view('checkups.index', compact('checkups'));
    }

    public function create()
    {
        return view('checkups.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'cash' => 'required',
        ]);

        $checkup = Checkup::create($request->all() + ['store_id' => 2]);

        return redirect(route('checkup.index'));
    }

    public function show(Checkup $checkup)
    {
        //
    }
    
    public function edit(Checkup $checkup)
    {
        //
    }
    
    public function update(Request $request, Checkup $checkup)
    {
        //
    }
    
    public function destroy(Checkup $checkup)
    {
        //
    }
}
