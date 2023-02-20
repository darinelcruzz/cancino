<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Charts\TestChart;
use App\{Shopping, Sale, Note, Store, Binnacle, Expense, Loan, Invoice, Waste, Goal, Employer, Equipment, Checkup, Task, TakenProduct};

class HelperController extends Controller
{
    function checkups()
    {
        $stores = Store::whereIn('type', ['p', 's'])->get();
        $checkups = Checkup::whereIn('status', [0,1,4])->get();

        return view('admin.checkups', compact('checkups', 'stores'));
    }

    function tasks()
    {
        $stores = Store::all();
        $tasks = Task::all();

        return view('admin.tasks', compact('tasks', 'stores'));
    }

    function expenses()
    {
        $expenses = Expense::where('type', 3)->get();
        $stores = Store::All();

        return view('admin.expenses', compact('expenses', 'stores'));
    }

    function loans(Store $store)
    {
        $lent = Loan::where('to', $store->id)
            ->where('status', '!=', 'facturado')
            ->where('status', '!=', 'cancelado')->get();
        $borrowed = Loan::where('from', $store->id)
            ->where('status', '!=', 'facturado')
            ->where('status', '!=', 'cancelado')->get();
        $invoiced = Invoice::where('from', $store->id)
            ->where('status', 'pendiente')->get();
        $payed = Invoice::where('from', $store->id)
            ->where('status', 'pagada')->get();

        return view('admin.loans', compact('lent', 'borrowed', 'store', 'invoiced', 'payed'));
    }

    function taken_products()
    {
        $pending = TakenProduct::whereNull('pos')->get()->groupBy('store_id');
        $deleted = TakenProduct::whereNotNull('pos')->get()->groupBy('pos');

        return view('admin.taken_products', compact('pending', 'deleted'));
    }

    function employers()
    {
        $stores = Employer::where('status', 1)->orderBy('store_id')->get()->groupBy('store_id');
        $employers = Employer::where('status', 1)->get();

        return view('admin.employers', compact('stores', 'employers'));
    }

    function equipments()
    {
        $equipments = Equipment::All();

        return view('admin.equipments', compact('equipments'));
    }

}
