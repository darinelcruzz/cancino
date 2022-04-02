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
        if (getStore()->id == 1) {
            $stores = Employer::where('status', '!=', 'inactivo')->orderBy('store_id')->get()->groupBy('store_id');
            $departments = Employer::where('status', '!=', 'inactivo')->get()->groupBy('job');
            $training = Employer::whereIn('status', ['evaluacion uno', 'evaluacion dos', 'evaluacion tres'])->get();
            $inactive = Employer::where('status', 'inactivo')->get();
            $storesArray = Store::pluck('name', 'id')->toArray();

            return view('admin.employers', compact('stores', 'departments', 'training', 'inactive', 'storesArray'));
        }

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
        // dd($request->all());
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
        $route = '/employers/' . $employer->id;
        $files = Storage::files($route);
        return view('employers.explore', compact('files', 'employer'));
    }

    function edit(Employer $employer)
    {
        return view('employers.edit', compact('employer'));
    }

    function update(Request $request, Employer $employer)
    {
        // dd($request->all());
        $validated = $this->validate($request, [
            'name' => 'sometimes|required',
            'birthday' => 'sometimes|required',
            'address' => 'sometimes|required',
            'married' => 'sometimes|required',
            'sons' => 'sometimes|required',
            'job' => 'sometimes|required',
            'store_id' => 'sometimes|required',
            'ingress' => 'sometimes|required',
            'salary' => 'sometimes|required',
            'status' => 'sometimes|required',
            'commision' => 'sometimes|required',
        ]);

        $employer->update($validated);
        $employer->touch();

        return redirect(route('employers.show', $employer));
    }

    function dismiss(Request $request, Employer $employer)
    {
        $employer->update($request->only('status'));

        $employer->storeDocuments(request());

        Movement::create([
            'employer_id' => $employer->id,
            'date' => date('Y-m-d'),
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

    function restore(Request $request, Employer $employer)
    {
        $validated = $request->validate(['store_id' => 'required', 'status' => 'required']);

        $employer->update($validated);

        Movement::create([
            'employer_id' => $employer->id,
            'date' => date('Y-m-d'),
            'store_id' => $employer->store_id,
            'type' => 1
        ]);

        return redirect(route('admin.employers'));
    }
}
