<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\{Employer, Store, Movement};

class EmployerController extends Controller
{
    function index()
    {
        $employers = Employer::where('status', 1)->where('store_id', auth()->user()->store_id)->get();

        return view('employers.index', compact('employers'));
    }
    function create()
    {
        $stores = Store::pluck('name', 'id')->toArray();

        return view('employers.create', compact('stores'));
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'birthday' => 'required',
            'address' => 'required',
            'married' => 'required',
            'sons' => 'required',
            'job' => 'required',
            'store_id' => 'required',
        ]);

        $employer = Employer::create($request->all());
        Movement::create(['ingress' => $employer->ingress, 'employer_id' => $employer->id, 'date' => $employer->ingress, 'store_id' => $employer->store_id]);

        if ($request->file('photo')) {
            $route = 'public/employers/' . $employer->id;
            $request->file('photo')->storeAs($route, 'photo.png');
        }
        if (auth()->user()->level < 4) {
            return redirect(route('admin.employers'));
        }else {
            return redirect(route('employers.index'));
        }

    }

    function show(Employer $employer)
    {
        return view('employers.show', compact('employer'));
    }

    function edit(Employer $employer)
    {
        //
    }

    function update(Request $request, Employer $employer)
    {
        //
    }

    function destroy(Employer $employer)
    {
        //
    }
}
