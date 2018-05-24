<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    function index()
    {
        $expenses = Expense::where('store_id', auth()->user()->store_id)->get();
        return view('expenses.index', compact('expenses'));
    }

    function create()
    {
        //
    }

    function store(Request $request)
    {
        //
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
