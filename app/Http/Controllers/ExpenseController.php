<?php

namespace App\Http\Controllers;

use App\Expense;
use Iluminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    function index()
    {
        $store = auth()->user()->username == 'cynthia' ? 2 : auth()->user()->store_id;
        $expenses = Expense::where('store_id', $store)->where('type', '0')->get();
        $ingreses = Expense::where('store_id', $store)->where('type', '1')->orderByDesc('id')->get()->take(3);
        $last = Expense::where('store_id', $store)->where('type', '0')->get()->last();
        return view('expenses.index', compact('expenses', 'ingreses', 'last', 'balance', 'store'));
    }

    function create()
    {
        $store = auth()->user()->username == 'cynthia' ? 2 : auth()->user()->store_id;
        $last = Expense::where('store_id', $store)->orderBy('check', 'desc')->first();
        return view('expenses.create', compact('last', 'store'));
    }

    function store(Request $request)
    {
        $store = auth()->user()->username == 'cynthia' ? 2 : auth()->user()->store_id;
        $this->validate($request, [
            'date' => 'required',
            'amount' => 'required',
            'concept' => 'required|sometimes',
            'store_id' => 'required',
        ]);

        // $expense = Expense::create($request->except('files'));
        $paths = [];
        for ($i=0; $i <= $request->quantity; $i++) {
            $path = $request->file("invoice$i")->store('public/expenses/store' . $store . "/$request->check");
            array_push($paths, $path);
        }
        dd($paths);

        if (auth()->user()->level < 3) {
            return redirect(route('admin.balances'));
        }

        return redirect(route('expenses.index'));
    }

    function show(Expense $expense)
    {
        //
    }

    function edit(Expense $expense)
    {
        //
    }

    function update(Request $request, Expense $expense)
    {
        //
    }

    function destroy(Expense $expense)
    {
        //
    }
}
