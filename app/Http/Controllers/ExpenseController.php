<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    function index()
    {
        $store = auth()->user()->store_id;
        $expenses = Expense::where('store_id', $store)->where('type', '0')->get();
        $ingreses = Expense::where('store_id', $store)->where('type', '1')->orderByDesc('id')->get()->take(3);
        $last = Expense::where('store_id', $store)->where('type', '0')->where('check', '!=', NULL)->get()->last();
        return view('expenses.index', compact('expenses', 'ingreses', 'last', 'balance', 'store'));
    }

    function create()
    {
        $store = auth()->user()->store_id;
        $last = Expense::where('store_id', $store)->orderBy('check', 'desc')->first();
        return view('expenses.create', compact('last', 'store'));
    }

    function store(Request $request)
    {
        $store = auth()->user()->store_id;
        $this->validate($request, [
            'date' => 'required',
            'amount' => 'required',
            'concept' => 'required|sometimes',
            'store_id' => 'required',
        ]);
        $route = 'public/expenses/store' . $store . "/$request->check";
        if ($request->file("invoice0")) {
            for ($i=0; $i <= $request->quantity; $i++) {
                $request->file("invoice$i")->store($route);
            }
        }

        $expense = Expense::create($request->all());

        if (auth()->user()->level < 3) {
            return redirect(route('admin.balances'));
        }

        return redirect(route('expenses.index'));
    }

    function show(Expense $expense)
    {
        $route = 'public/expenses/store' . $expense->store_id . "/$expense->check";
        $files = Storage::files($route);
        return view('expenses.show', compact('files', 'expense', 'route'));
    }

    function edit(Expense $expense)
    {
        //
    }

    function update(Request $request)
    {
        if ($request->file("invoice0")) {
            for ($i=0; $i <= $request->quantity; $i++) {
                $request->file("invoice$i")->store($request->route);
            }
        }

        return redirect(route('expenses.show', ['id' => $request->id]));
    }

    function destroy(Expense $expense)
    {
        //
    }
}
