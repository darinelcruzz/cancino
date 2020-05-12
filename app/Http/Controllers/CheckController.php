<?php

namespace App\Http\Controllers;

use App\{Check, Store, ExpensesGroup, AccountMovement};
use Illuminate\Http\Request;

class CheckController extends Controller
{
    function index(Store $store = null)
    {
        if ($store == null) $store = getStore();

        $balance = $store->expenses_account->balance ?? 0;
        $checks = Check::fromStore($store->id)->get();
        $last = Check::fromStore($store->id)->get()->last();
        $movements = AccountMovement::where('bank_account_id', getStore()->expenses_account->id)
            ->whereNull('check_id')
            ->get()
            ->take(3);
        return view('checks.index', compact('checks', 'movements', 'balance', 'last'));
    }

    function create(Store $store = null)
    {
        if ($store == null) $store = getStore();
        $last = Check::fromStore($store->id)->get()->last();
        $groups = ExpensesGroup::pluck('name', 'id')->toArray();
        return view('checks.create', compact('last', 'groups'));
    }

    function store(Request $request)
    {
        $validated = $this->validate($request, [
            'emitted_at' => 'required',
            'amount' => 'required',
            'name' => 'sometimes|required',
            'concept' => 'sometimes|required',
            'store_id' => 'required',
            'folio' => 'sometimes|required',
            'expenses_group_id' => 'sometimes|required',
        ]);
        
        Check::create($request->except(['expenses_group_id', 'bank_account_id']));

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

    function destroy(Check $check)
    {
        //
    }
}
