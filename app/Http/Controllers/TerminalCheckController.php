<?php

namespace App\Http\Controllers;

use App\{Check, Store, ExpensesGroup, AccountMovement, BankAccount};
use Illuminate\Http\Request;
use App\Imports\ChecksImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class TerminalCheckController extends Controller
{
    function index()
    {
        $others = Store::whereIn('type', ['c', 'e'])->with('bank_accounts.checks')->get();
        $steren = Store::whereIn('type', ['p', 's'])->with('bank_accounts.checks')->get();

        return view('checks.terminal.index', compact('others', 'steren'));
    }

    function create(BankAccount $bank_account)
    {
        $last = Check::fromBankAccount($bank_account->id)->get()->last();
        $groups = ExpensesGroup::where('type', 'cargo')->pluck('name', 'id')->toArray();
        return view('checks.terminal.create', compact('last', 'groups', 'bank_account'));
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'expenses_group_id' => 'sometimes|required',
            'provider_id' => 'sometimes|required',
        ]);

        $validated = $this->validate($request, [
            'emitted_at' => 'required',
            'amount' => 'required',
            'name' => 'sometimes|required',
            'concept' => 'sometimes|required',
            'bank_account_id' => 'required',
            'folio' => 'sometimes|required',
            'observations' => 'sometimes',
        ]);

        $check = Check::create($validated);

        if ($request->file("invoice0")) {
            $route = 'public/expenses/store' . $request->store_id . "/T$request->folio";
            for ($i=0; $i <= $request->quantity; $i++) {
                $request->file("invoice$i")->storeAs($route, $request->{"name$i"});
            }
        }

        return redirect(route('terminal.index'));
    }

    // function show(Check $check)
    // {
    //     $route = 'public/expenses/store' . $check->bank_account->store_id . "/T$check->folio";
    //     $files = Storage::files($route);
    //     return view('checks.show', compact('files', 'check', 'route'));
    // }
    //
    // function policy(Check $check)
    // {
    //     return view('checks.policy', compact('check'));
    // }

    function destroy(Check $check)
    {
        $check->update(['amount' => 0]);
        $check->account_movement->update([
            'amount' => 0,
            'provider_id' => 10,
            'expenses_group_id' => 10,
        ]);

        return redirect(route('terminal.index'));
    }
}
