<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Charts\TestChart;
use App\{Shopping, Sale, Note, Store, Binnacle, Expense, Loan, Invoice, Waste, Goal, Employer, Equipment, Checkup};

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

        return redirect(route('admin.shoppings'));
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
        $notes = Note::all();
        return view('admin.notes', compact('notes'));
    }

    function checkups()
    {
        $checkups = Checkup::all();
        return view('admin.checkups', compact('checkups'));
    }

    function balances()
    {
        $stores = Store::where('type', '!=', 'c')->get();
        return view('admin.balances', compact('stores'));
    }

    function expenses(Store $store)
    {
        $expenses = Expense::where('store_id', $store->id)
            ->where('type', '0')->get();
        $ingreses = Expense::where('store_id', $store->id)
            ->where('type', '1')->orderByDesc('id')
            ->get()->take(3);
        $last = Expense::where('store_id', $store->id)
            ->where('type', '0')
            ->where('check', '!=', NULL)
            ->get()->last();
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

        DB::raw("SET lc_time_names = 'es_ES'");

        $sales = Sale::where('store_id', $store->id)
            ->whereMonth('date_sale', substr($date, 5))
            ->whereYear('date_sale', substr($date, 0, 4))
            ->selectRaw('public, DATE_FORMAT(date_sale, "%a %d") as day')
            ->get();

        $public = $sales->keyBy('day')->map(function ($sale) {
            return $sale->public;
        });
        $black = $sales->keyBy('day')->map(function ($sale) use ($date, $store) {
            return $sale->getScale($date, $store->id)[0];
        });
        $star = $sales->keyBy('day')->map(function ($sale) use ($date, $store) {
            return $sale->getScale($date, $store->id)[1];
        });
        $golden = $sales->keyBy('day')->map(function ($sale) use ($date, $store) {
            return $sale->getScale($date, $store->id)[2];
        });

        $chart->labels($public->keys());
        $chart->height(400);
        $chart->dataset('Ventas a público', 'line', $public->values())->options(['borderColor' => '#E03317', 'fill' => false]);
        $chart->dataset('Punto negro', 'line', $black->values())->options(['borderColor' => '#000000', 'fill' => false]);
        $chart->dataset('Estrella', 'line', $star->values())->options(['borderColor' => '#0DAC2A', 'fill' => false]);
        $chart->dataset('Dorada', 'line', $golden->values())->options(['borderColor' => '#ACAC0D', 'fill' => false]);

        return $chart;
    }
}
