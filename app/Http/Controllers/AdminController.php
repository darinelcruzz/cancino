<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Shopping;
use App\Sale;
use App\Note;
use App\Store;
use App\Binnacle;
use App\Expense;
use App\Loan;
use App\Invoice;

class AdminController extends Controller
{
    function shoppings()
    {
        $shoppings = Shopping::all();
        return view('admin.shoppings', compact('shoppings'));
    }

    function verify(Shopping $shopping)
    {
        $shopping->update(['status' => 'verificado']);
        return back();
    }

    function sales()
    {
        $dates = Sale::selectRaw('date_sale, store_id, total, DATE_FORMAT(date_sale, "%Y-%m") as month')->orderBy('month', 'des')->get()->groupBy('month');
        $dates->transform(function ($item, $key) {
            return $item->groupBy('date_sale');
        });

        return view('admin.sales', compact('dates'));
    }

    function notes()
    {
        $notes = Note::all();
        return view('admin.notes', compact('notes'));
    }

    function balances()
    {
        $stores = Store::all();
        return view('admin.balances', compact('stores'));
    }

    function expenses(Store $store)
    {
        $store = $store->id;
        $expenses = Expense::where('store_id', $store)->where('type', '0')->get();
        $ingreses = Expense::where('store_id', $store)->where('type', '1')->orderByDesc('id')->get()->take(3);
        $last = Expense::where('store_id', $store)->where('type', '0')->get()->last();
        return view('expenses.index', compact('expenses', 'ingreses', 'last', 'balance', 'store'));
    }

    function binnacles()
    {
        $activitys = Binnacle::where('status', 'realizada')->get();
        $plannings = Binnacle::where('status', 'pendiente')->get();

        return view('admin.binnacles', compact('activitys', 'plannings'));
    }

    function loans(Store $store)
    {
        $lent = Loan::where('to', $store->id)->where('status', '!=', 'facturado')->get();
        $borrowed = Loan::where('from', $store->id)->where('status', '!=', 'facturado')->get();
        $invoiced = Invoice::where('from', $store->id)->where('status', 'pendiente')->get();
        $payed = Invoice::where('from', $store->id)->where('status', 'pagada')->get();

        return view('admin.loans', compact('lent', 'borrowed', 'store', 'invoiced', 'payed'));
    }
}
