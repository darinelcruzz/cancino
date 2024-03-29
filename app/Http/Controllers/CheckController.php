<?php

namespace App\Http\Controllers;

use App\{Check, Store, ExpensesGroup, AccountMovement};
use Illuminate\Http\Request;
use App\Imports\ChecksImport;
use Illuminate\Support\Facades\Storage;
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

        foreach ($request->invoices as $key => $value) {
            $route = 'public/expenses/store' . $request->store_id . "/$check->folio";
            ($value['file'])->storeAs($route, $value['name'] . "___" . $value['amount']);
        }

        return redirect(route('checks.index', $request->store_id));
    }

    function show(Check $check)
    {
        $route = 'public/expenses/store' . $check->bank_account->store_id . "/$check->folio";
        $files = Storage::files($route);
        return view('checks.show', compact('files', 'check', 'route'));
    }

    function edit(Check $check)
    {
        $check->update(['status' => 'revisado']);
        return redirect(route('checks.index', getStore()));
    }

    function print(Check $check)
    {
        $route = 'public/expenses/store' . $check->bank_account->store_id . "/$check->folio";
        $files = Storage::files($route);
        return view('checks.print', compact('files', 'check', 'route'));
    }

    function upload(Request $request, Check $check)
    {
        // dd($request->all());
        $request->validate([
            'invoices' => 'required|array|min:1',
        ]);

        foreach ($request->invoices as $key => $value) {
            ($value['file'])->storeAs($request->route, $value['name'] . "___" . $value['amount']);
        }

        if($check->bank_account->type == 'gastos') {
            return redirect(route('checks.show', $check));
        }

        return redirect(route('terminal.show', $check));
    }

    function remove($path)
    {
        $path = str_replace('-', '/', $path);

        Storage::delete($path);

        return back();
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
        $check->update(['amount' => 0, 'status' => 'cancelado']);
        $check->account_movement->update([
            'amount' => 0,
            'provider_id' => 10,
            'expenses_group_id' => 10,
        ]);

        return redirect(route('checks.index', $check->bank_account->store));
    }
}
