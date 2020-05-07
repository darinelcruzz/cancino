<?php

namespace App\Http\Controllers;

use App\AccountMovement;
use App\{ExpensesGroup, Provider, BankAccount};
use Illuminate\Http\Request;

class AccountMovementController extends Controller
{
    function index()
    {
        $movements = AccountMovement::all();
        return view('account_movements.index', compact('movements'));
    }

    function create()
    {
        $groups = ExpensesGroup::pluck('name', 'id')->toArray();
        $providers = Provider::pluck('social', 'id')->toArray();
        $bank_accounts = BankAccount::pluck('number', 'id')->toArray();
        return view('account_movements.create', compact('groups', 'providers', 'bank_accounts'));
    }

    function store(Request $request)
    {
        $attributes = $request->validate([
            'concept' => 'required',
            'type' => 'required',
            'added_at' => 'required',
            'amount' => 'required',
            'bank_account_id' => 'required',
            'provider_id' => 'required',
            'expenses_group_id' => 'required',
        ]);

        AccountMovement::create($attributes);

        return redirect(route('account_movements.index'));
    }

    function show(AccountMovement $accountMovement)
    {
        //
    }

    function edit(AccountMovement $accountMovement)
    {
        $groups = ExpensesGroup::pluck('name', 'id')->toArray();
        $providers = Provider::pluck('social', 'id')->toArray();
        $bank_accounts = BankAccount::pluck('number', 'id')->toArray();
        return view('account_movements.edit', compact('accountMovement', 'groups', 'providers', 'bank_accounts'));
    }

    function update(Request $request, AccountMovement $accountMovement)
    {
        $attributes = $request->validate([
            'concept' => 'required',
            'type' => 'required',
            'added_at' => 'required',
            'amount' => 'required',
            'bank_account_id' => 'required',
            'provider_id' => 'required',
            'expenses_group_id' => 'required',
        ]);

        $accountMovement->update($attributes);

        return redirect(route('account_movements.index'));
    }

    function destroy(AccountMovement $accountMovement)
    {
        //
    }
}
