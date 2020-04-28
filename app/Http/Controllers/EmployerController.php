<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\{Employer, Store, Movement, User};
use App\Mail\EmployerCreated;
use Illuminate\Support\Facades\Mail;

class EmployerController extends Controller
{
    function index()
    {
        $employers = Employer::where('status', '!=', 'inactivo')
            ->where('store_id', auth()->user()->store_id)
            ->get();

        return view('employers.index', compact('employers'));
    }
    function create()
    {
        $salary = Store::find(auth()->user()->store_id)->salary;
        return view('employers.create', compact('salary'));
    }

    function store(Request $request)
    {
        $validated = $this->validate($request, [
            'name' => 'required',
            'birthday' => 'required',
            'address' => 'required',
            'married' => 'required',
            'sons' => 'required',
            'job' => 'required',
            'store_id' => 'required',
            'ingress' => 'required',
            'salary' => 'required',
        ]);

        $employer = Employer::create($validated);

        $employer->update([
            'salary' => $employer->store->salary
        ]);

        Movement::create([
            'employer_id' => $employer->id,
            'date' => $employer->ingress,
            'store_id' => $employer->store_id
        ]);

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
        return view('employers.edit', compact('employer'));
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
            'salary' => 'sometimes|required',
        ]);

        $employer->update($request->all());

        return redirect(route('employers.index'));
    }

    function dismiss(Employer $employer)
    {
        $employer->update(['status' => 'inactivo']);
        $date = date('Y-m-d');

        Movement::create([
            'employer_id' => $employer->id,
            'date' => $employer->ingress,
            'store_id' => $employer->store_id,
            'type' => 0
        ]);

        return redirect(route('employers.index'));
    }

    function notify(Employer $employer)
    {
        $emails = User::where('level', '<', 2)->pluck('email')->toArray();

        Mail::to($emails)->queue(new EmployerCreated($employer));

        return redirect(route('employers.index'));
    }


}
