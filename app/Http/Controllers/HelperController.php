<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Charts\TestChart;
use App\{Shopping, Sale, Note, Store, Binnacle, Expense, Loan, Invoice, Waste, Goal, Employer, Equipment};

class HelperController extends Controller
{
    function documents()
    {
        $labels = ['Todas', 'Chiapas', 'Soconusco', 'Altos', 'Galerías Tuxtla', 'Galerías Tapachula'];
        $route = 'public/documents';
        $folders = Storage::directories($route);

        return view('documents.show', compact('folders', 'route', 'labels'));
    }

    function shoppings()
    {
        $stores = Store::where('type', '!=', 'c')->get();
        $shoppings = Shopping::all();
        return view('admin.shoppings', compact('shoppings', 'stores'));
    }

    function verify(Request $request)
    {
        foreach (Shopping::find($request->shoppings) as $shopping) {
            $shopping->update([
                'status' => 'verificado'
            ]);
        }

        return redirect(route('admin.shoppings'));
    }

    function notes()
    {
        $notes = Note::where('status', '!=', 'aplicada')->get();

        return view('admin.notes', compact('notes'));
    }

    function tasks()
    {
        $stores = Store::all();
        $tasks = Task::all();

        return view('admin.tasks', compact('tasks', 'stores'));
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

    function wastes()
    {
        $pendings = Waste::where('status', 'pendiente')->get()->groupBy('store_id');
        $complete = Waste::where('status', 'destruido')->get()->groupBy('store_id');

        return view('admin.wastes', compact('pendings', 'complete'));
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
