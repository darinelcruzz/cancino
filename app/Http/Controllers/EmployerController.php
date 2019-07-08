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
            'ine' => 'required',
            'curp' => 'required',
            'birth_certificate' => 'required',
            'address_file' => 'required',
        ]);

        $employer = Employer::create($request->all());

        Movement::create([
            'ingress' => $employer->ingress, 
            'employer_id' => $employer->id, 
            'date' => $employer->ingress, 
            'store_id' => $employer->store_id
        ]);

        $employer->storeDocuments($request);

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

    function explore(Employer $employer)
    {
        $route = 'public/employers/' . $employer->id;
        $files = Storage::files($route);

        return view('employers.explore', compact('files', 'employer'));
    }

    function edit(Employer $employer)
    {
        $stores = Store::pluck('name', 'id')->toArray();

        return view('employers.edit', compact('employer', 'stores'));
    }

    function update(Request $request, Employer $employer)
    {
        $this->validate($request, [
            'name' => 'required',
            'birthday' => 'required',
            'address' => 'required',
            'married' => 'required',
            'sons' => 'required',
            'job' => 'required',
            'store_id' => 'required',
            'ine' => 'sometimes|required',
            'curp' => 'sometimes|required',
            'birth_certificate' => 'sometimes|required',
            'address_file' => 'sometimes|required',
        ]);

        $employer->update($request->all());

        $employer->storeDocuments($request);

        return redirect(route('employers.index'));
    }

    function destroy(Employer $employer)
    {
        //
    }


}
