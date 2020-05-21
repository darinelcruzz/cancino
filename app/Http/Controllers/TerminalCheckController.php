<?php

namespace App\Http\Controllers;

use App\{Check, Store, ExpensesGroup, AccountMovement, BankAccount};
use Illuminate\Http\Request;
use App\Imports\ChecksImport;
use Maatwebsite\Excel\Facades\Excel;

class TerminalCheckController extends Controller
{
    function index()
    {
        $stores = Store::with('bank_accounts.checks')->get();

        return view('checks.terminal.index', compact('stores'));
    }

    function create(BankAccount $bank_account)
    {
        $last = Check::fromBankAccount($bank_account->id)->get()->last();
        $groups = ExpensesGroup::where('type', 'cargo')->pluck('name', 'id')->toArray();
        return view('checks.terminal.create', compact('last', 'groups', 'bank_account'));
    }

    function store(Request $request)
    {
        $validated = $this->validate($request, [
            'emitted_at' => 'required',
            'amount' => 'required',
            'name' => 'sometimes|required',
            'concept' => 'sometimes|required',
            'bank_account_id' => 'required',
            'folio' => 'sometimes|required',
            'expenses_group_id' => 'sometimes|required',
            'provider_id' => 'sometimes|required',
        ]);
        
        Check::create($request->except(['expenses_group_id', 'store_id', 'provider_id']));

        if ($request->file("invoice0")) {
            $route = 'public/expenses/store' . $request->store_id . "/T$request->folio";
            for ($i=0; $i <= $request->quantity; $i++) {
                $request->file("invoice$i")->storeAs($route, $request->{"name$i"});
            }
        }

        return redirect(route('terminal.index'));
    }

    function show(Check $check)
    {
        //
    }

    function edit(Check $check)
    {
        //
    }

    function update(Request $request, Check $check)
    {
        //
    }

    function policy(Check $check)
    {
        return view('checks.policy', compact('check'));
    }

    function destroy(Check $check)
    {
        $check->update(['amount' => 0]);
        $check->account_movement->update([
            'amount' => 10,
            'provider_id' => 10,
            'expenses_group_id' => 10,
        ]);

        return redirect(route('terminal.index'));
    }
}
