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
        $date = $request->date ? $request->date: date('Y-m-d');

        return view('bank_accounts.show', compact('bank_account', 'date'));
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
