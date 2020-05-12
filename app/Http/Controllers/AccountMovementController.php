<?php

namespace App\Http\Controllers;

use App\AccountMovement;
use App\{ExpensesGroup, Provider, BankAccount, Store};
use Illuminate\Http\Request;

class AccountMovementController extends Controller
{
    function choose()
    {
        $stores = Store::where('type', '!=', 'c')->get();
        $bank_accounts = BankAccount::all()->where('type', 'gastos')->pluck('full_name', 'id')->toArray();
        $groupA = ExpensesGroup::where('type', 'abono')->pluck('name', 'id')->toArray();
        $groupB = ExpensesGroup::where('type', 'cargo')->pluck('name', 'id')->toArray();
        return view('account_movements.choose', compact('stores', 'bank_accounts', 'groupA', 'groupB'));
    }

    function index(Store $store = null)
    {
        if ($store == null) {
            $store = getStore();
        }

        $movements = AccountMovement::where('bank_account_id', $store->terminal_account->id)->get();
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
            'expenses_group_id' => 'required',
        ]);

        AccountMovement::create($attributes);

        return redirect(route('account_movements.choose'));
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
            'provider_id' => 'required',
            'expenses_group_id' => 'required',
        ]);

        $accountMovement->update($attributes);

        if ($accountMovement->next_register_exists) {
            return redirect($account_movement->next_route);
        }

        return redirect(route('account_movements.index'));
    }

    function destroy(AccountMovement $accountMovement)
    {
        //
    }
}
