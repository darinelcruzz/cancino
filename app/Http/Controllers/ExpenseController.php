<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Store;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    function index()
    {
        $store = Store::where('id', auth()->user()->store_id)->first();
        $expenses = Expense::where('store_id', $store->id)->where('type', '0')->get();
        $ingreses = Expense::where('store_id', $store->id)->where('type', '1')->orderByDesc('id')->get()->take(3);
        $last = Expense::where('store_id', $store->id)->where('type', '0')->where('check', '!=', NULL)->get()->last();
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
        $validated = $this->validate($request, [
            'date' => 'required',
            'amount' => 'required',
            'name' => 'required|sometimes',
            'letter' => 'required|sometimes',
            'concept' => 'required|sometimes',
            'type' => 'required',
            'store_id' => 'required',
            'check' => 'required|sometimes',
            'group' => 'required|sometimes',
        ]);

        $route = 'public/expenses/store' . $store . "/$request->check";
        if ($request->file("invoice0")) {
            for ($i=0; $i <= $request->quantity; $i++) {
                $request->file("invoice$i")->storeAs($route, $request->{"name$i"});
            }
        }

        $expense = Expense::create($validated + ['observations' => $request->observations]);

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
        return view('expenses.edit', compact('expense'));
    }

    function update(Request $request)
    {
        //
    }

    function policy(Expense $expense)
    {
        $store = Store::where('id', $expense->store_id)->get()->first();

        return view('expenses.policy', compact('expense', 'store'));
    }

    function upFile(Request $request)
    {
        if ($request->file("invoice0")) {
            for ($i=0; $i <= $request->quantity; $i++) {
                $request->file("invoice$i")->storeAs($request->route, $request->{"name$i"});
            }
        }

        return redirect(route('expenses.show', ['id' => $request->id]));
    }

    function deleteFile($path)
    {
        $path = str_replace('-', '/', $path);

        Storage::delete($path);

        return back();
    }
}
