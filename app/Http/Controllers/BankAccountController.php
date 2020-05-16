<?php

namespace App\Http\Controllers;

use App\BankAccount;
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

    function show(BankAccount $bank_account)
    {
        return view('bank_accounts.show', compact('bank_account'));
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
