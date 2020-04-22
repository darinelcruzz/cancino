<?php

namespace App\Http\Controllers;

use App\{Debt, Employer, Payment};
use Illuminate\Http\Request;

class DebtController extends Controller
{
    function index()
    {
        $debts = Debt::with('store', 'employer', 'deposits')->get();
        return view('debts.index', compact('debts'));
    }

    function create()
    {
        $employers = Employer::whereStatus('1')->pluck('name', 'id')->toArray();
        return view('debts.create', compact('employers'));
    }

    function store(Request $request)
    {
        $request->validate([
            'store_id' => 'required',
            'employer_id' => 'required',
            'requested_at' => 'required',
            'description' => 'required',
            'amount' => 'required',
            'payments' => 'required',
        ]);

        $debt = Debt::create($request->all());

        return redirect(route('debts.index'));
    }

    function show(Debt $debt)
    {
        return view('debts.show', compact('debt'));
    }
}
