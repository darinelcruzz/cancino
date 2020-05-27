<?php

namespace App\Http\Controllers;

use App\{BankAccount, AccountMovement};
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    function index()
    {
        //
    }

    function create()
    {
        //
    }

    function store(Request $request)
    {
        //
    }

    function show(Request $request, BankAccount $bank_account)
    {
        $date = $request->date ? $request->date: date('Y-m');

        $movements = AccountMovement::where('bank_account_id', $bank_account->id)
            ->whereMonth('added_at', substr($date, 5))
            ->whereYear('added_at', substr($date, 0, 4))
            ->when(auth()->user()->level > 2, function ($query) {
                return $query->whereNull('expenses_group_id');
            })
            ->get();

        return view('bank_accounts.show', compact('bank_account', 'date', 'movements'));
    }

    function edit(BankAccount $bankAccount)
    {
        //
    }

    function update(Request $request, BankAccount $bankAccount)
    {
        //
    }

    function destroy(BankAccount $bankAccount)
    {
        //
    }
}
