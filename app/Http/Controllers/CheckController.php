<?php

namespace App\Http\Controllers;

use App\{Check, Store, ExpensesGroup, AccountMovement};
use Illuminate\Http\Request;
use App\Imports\ChecksImport;
use Maatwebsite\Excel\Facades\Excel;

class CheckController extends Controller
{
    function index(Store $store = null)
    {
        if ($store == null) $store = getStore();

        $balance = $store->expenses_account->balance ?? 0;
        $checks = Check::fromBankAccount($store->expenses_account->id)->get();
        $last = Check::fromBankAccount($store->expenses_account->id)->get()->last();
        $movements = AccountMovement::where('bank_account_id', $store->expenses_account->id)
            ->where('type', 'abono')
            ->orderBy('added_at', 'desc')
            ->get()->take(3);
        return view('checks.index', compact('checks', 'movements', 'balance', 'last', 'store'));
    }

    function create(Store $store = null)
    {
        if ($store == null) $store = getStore();
        $last = Check::fromBankAccount($store->expenses_account->id)->get()->last();
        $groups = ExpensesGroup::pluck('name', 'id')->toArray();
        return view('checks.create', compact('last', 'groups', 'store'));
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
            $route = 'public/expenses/store' . $request->store_id . "/$request->folio";
            for ($i=0; $i <= $request->quantity; $i++) {
                $request->file("invoice$i")->storeAs($route, $request->{"name$i"});
            }
        }

        return redirect(route('checks.index'));
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

    function import(Request $request)
    {
        if ($request->checks) {
            // dd($request->all());
            Excel::import(new ChecksImport, $request->file('checks'));
        
            return "HECHO, SIN PROBLEMAS";
        }

        return view('checks.import');
    }

    function destroy(Check $check)
    {
        //
    }
}
