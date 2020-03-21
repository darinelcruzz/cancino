<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Charts\TestChart;
use App\{Shopping, Sale, Note, Store, Binnacle, Expense, Loan, Invoice, Waste, Goal, Employer, Equipment, Checkup, Task, Checklist};

class AdminController extends Controller
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

        return redirect(route('helper.shoppings'));
    }

    function sales()
    {
        $dates = Sale::selectRaw('date_sale, store_id, total, DATE_FORMAT(date_sale, "%Y-%m") as month')
            ->orderBy('month', 'des')
            ->get()->groupBy('month')
            ->take(12);
        $dates->transform(function ($item, $key) {
            return $item->groupBy('date_sale');
        });

        return view('admin.sales', compact('dates'));
    }

    function deposits(Request $request)
    {
        $date = $request->date ? $request->date: date('Y-m');

        $months = Sale::whereMonth('date_sale', substr($date, 5))
            ->whereYear('date_sale', substr($date, 0, 4))
            ->orWhereMonth('date_sale', substr($date, 5) - 1)
            ->whereYear('date_sale', substr($date, 0, 4))
            ->with('checkup:id,cash_sums,card_sums')
            ->selectRaw('id, observations, status,
            date_sale, store_id, date_deposit, cash,
            DATE_FORMAT(date_sale, "%Y-%m") as month, checkup_id')
            ->orderBy('month', 'des')
            ->get()
            ->groupBy('month');

        $months->transform(function ($item, $key) {
            return $item->groupBy('date_sale');
        });

        return view('admin.deposits', compact('months', 'date'));
    }

    function notes()
    {
        $stores = Store::where('type', '!=', 'c')->get();
        $notes = Note::all();

        return view('admin.notes', compact('notes', 'stores'));
    }

    function checkups()
    {
        $stores = Store::where('type', '!=', 'c')->get();
        $checkups = Checkup::all();

        return view('admin.checkups', compact('checkups', 'stores'));
    }

    function tasks()
    {
        $stores = Store::all();
        $tasks = Task::all();

        return view('admin.tasks', compact('tasks', 'stores'));
    }

    function balances()
    {
        $stores = Store::where('type', '!=', 'c')->get();

        return view('admin.balances', compact('stores'));
    }

    function expenses()
    {
        $expenses = Expense::where('type', 3)->get();
        $stores = Store::All();

        return view('admin.expenses', compact('expenses', 'stores'));
    }

    function binnacles()
    {
        $activitys = Binnacle::where('status', 'realizada')->get();
        $plannings = Binnacle::where('status', 'pendiente')->get();

        return view('admin.binnacles', compact('activitys', 'plannings'));
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

    function goals()
    {
        $dates = Goal::All()->groupBy('month');
        $dates->transform(function ($item, $key) {
            return $item->groupBy('year');
        });

        return view('admin.goals', compact('dates'));
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

    function checklist()
    {
        $checklists = Checklist::All();
        $stores = Store::where('type', '!=', 'c')->get();

        return view('admin.checklists', compact('checklists', 'stores'));
    }

    function public(Request $request)
    {
        $date = isset($request->date) ? $request->date : date('Y-m');

        $stores = Store::where('type', '!=', 'c')->get();

        foreach ($stores as $store) {
            ${strtolower($store->tabName)} = $this->buildChart($store, $date);
            $sales[$store->id]= $store->getSalesSum($date);
            $points[$store->id]= $store->getPoint($date);
            $stars[$store->id]= $store->getStar($date);
            $goldens[$store->id]= $store->getGolden($date);
        }

        return view('admin.public', compact('date', 'chiapas', 'soconusco', 'altos', 'gale_tux', 'gale_tapa', 'sales', 'points', 'stars', 'goldens'));
    }

    function buildChart(Store $store, $date)
    {
        $chart = new TestChart;

        $black = Goal::where('year', substr($date, 0, 4) - 1)
            ->where('month', substr($date, 5))
            ->where('store_id', $store->id)
            ->pluck('sale')->first();

        $multiples = Goal::where('year', substr($date, 0, 4))->where('month', substr($date, 5))
            ->where('store_id', $store->id)
            ->select('star', 'golden', 'days')
            ->first()
            ->toArray();

        $star = $black * $multiples['star'];
        $golden = $star * $multiples['golden'];
        $workdays = $multiples['days'];
        $currentMonth = substr($date, 5) == date('m');

        $sales = Sale::whereYear('date_sale', substr($date, 0, 4))
            ->whereMonth('date_sale', substr($date, 5))
            ->where('store_id', $store->id)
            ->selectRaw('public, DATE_FORMAT(date_sale, "%d") as day')
            ->get()
            ->keyBy('day');

        $keys = $sales->keys()->push('Siguiente');
        $chart->labels($keys);
        $chart->dataset('Ventas a público', 'line', $sales->pluck('public')->values())->options(['borderColor' => '#E03317', 'fill' => false]);
        $chart->dataset('Punto negro', 'line', $this->getPointArray($black, $sales, $workdays, $currentMonth))->options(['borderColor' => '#000000', 'fill' => false]);
        $chart->dataset('Estrella', 'line', $this->getPointArray($star, $sales, $workdays, $currentMonth))->options(['borderColor' => '#0DAC2A', 'fill' => false]);
        $chart->dataset('Estrella dorada', 'line', $this->getPointArray($golden, $sales, $workdays, $currentMonth))->options(['borderColor' => '#ACAC0D', 'fill' => false]);

        return $chart;
    }

    function getPointArray($point, $sales, $workdays, $currentMonth)
    {
        $i = $salesSum = 0;
        $returned_sales = [];

        if ($currentMonth) {
            $sales = $sales->pluck('public')->push(0);
        } else {
            $sales = $sales->pluck('public');
        }

        foreach ($sales as $sale) {
            array_push($returned_sales, max(round(($point - $salesSum)/($workdays - $i), 0), 2));
            $i += 1;
            $salesSum += $sale;
        }

        return $returned_sales;
    }
}
