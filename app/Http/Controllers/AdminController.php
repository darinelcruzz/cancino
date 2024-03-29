<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Charts\TestChart;
use App\{Shopping, Sale, Note, Store, Binnacle, Expense, Loan, Invoice, Waste, Goal, Employer, Equipment, Checkup, Task, Checklist, TakenProduct, Commision};

class AdminController extends Controller
{
    function sales()
    {
        $dates = Sale::selectRaw('date_sale, store_id, total, DATE_FORMAT(date_sale, "%Y-%m") as month')
            ->orderBy('month', 'desc')
            ->get()->groupBy('month')
            ->take(12);
        $dates->transform(function ($item, $key) {
            return $item->groupBy('date_sale');
        });

        $header = Store::whereIn('type', ['p', 's'])->pluck('name', 'id');

        return view('admin.sales', compact('dates', 'header'));
    }

    function awards()
    {
        $employers = Employer::where('status', '!=', 'inactivo')
          ->get();
        $commisions = Commision::where('goal_id', '>', '240')
        ->get();

        return view('admin.awards', compact('employers', 'commisions'));
    }

    function deposits(Request $request)
    {
        $date = $request->date ? $request->date: date('Y-m');

        $storesCollection = Store::whereNotIn('type', ['m', 'c', 'e'])->pluck('name', 'id');

        $pendings = Sale::whereStatus('pendiente')->orderBy('store_id')->get()->groupBy('store_id');

        // dd($pendings);

        $months = Sale::whereMonth('date_sale', substr($date, 5))
            ->whereYear('date_sale', substr($date, 0, 4))
            ->orWhereMonth('date_sale', substr($date, 5) - 1)
            ->whereYear('date_sale', substr($date, 0, 4))
            ->with('checkup:id,cash_sums,card_sums,transfer_sums,retention,status')
            ->selectRaw('id, observations, status,
            date_sale, store_id, date_deposit, cash,
            DATE_FORMAT(date_sale, "%Y-%m") as month, checkup_id')
            ->orderBy('month', 'desc')
            ->get()
            ->groupBy('month');

        $months->transform(function ($item, $key) {
            return $item->groupBy('date_sale');
        });

        return view('admin.deposits', compact('months', 'date', 'storesCollection', 'pendings'));
    }

    function checkups()
    {
        $stores = Store::whereIn('type', ['p', 's'])->get();
        $checkups = Checkup::orderBy('id', 'desc')->get()->take(400);

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

    function storeExpenses(Store $store)
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
        $added = Invoice::where('to', $store->id)->get();
        $payed = Invoice::where('from', $store->id)
            ->where('status', 'pagada')->get();

        return view('admin.loans', compact('lent', 'borrowed', 'store', 'invoiced', 'payed', 'added'));
    }

    function invoices()
    {
        $stores = Store::whereIn('type', ['p', 's'])
            ->with('invoices.fromr:id,name')
            ->get();

        return view('invoices.index', compact('stores'));
    }

    function taken_products()
    {
        $pending = TakenProduct::whereNull('pos')->get()->groupBy('store_id');
        $deleted = TakenProduct::whereNotNull('pos')->get()->groupBy('pos');
        return view('admin.taken_products', compact('pending', 'deleted'));
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
        $stores = Employer::where('status', '!=', 'inactivo')->orderBy('store_id')->get()->groupBy('store_id');
        $departments = Employer::where('status', '!=', 'inactivo')->get()->groupBy('job');
        $training = Employer::whereIn('status', ['evaluacion uno', 'evaluacion dos', 'evaluacion tres'])->get();
        $inactive = Employer::where('status', 'inactivo')->get();
        $storesArray = Store::pluck('name', 'id')->toArray();

        return view('admin.employers', compact('stores', 'departments', 'training', 'inactive', 'storesArray'));
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

    function public_sales(Request $request)
    {
        $date = isset($request->date) ? $request->date : date('Y-m');

        $stores = Store::whereNotIn('type', ['c', 'm', 'e'])->get();

        foreach ($stores as $store) {
            ${strtolower($store->tabName)} = $this->buildChart($store, $date);
            $charts[$store->id] = strtolower($store->tabName);
            $sales[$store->id]= $this->getSalesSum($store->id, $date);
            $points[$store->id]= $store->getPoint($date);
            $stars[$store->id]= $store->getStar($date);
            $goldens[$store->id]= $store->getGolden($date);
        }

        // dd($stores->pluck('name'), $points, $charts);

        return view('admin.public', compact('date', 'charts', 'sales', 'points', 'stars', 'goldens', 'chiapas','soconusco', 'san_cristobal', 'altos', 'gale_tux', 'gale_tapa', 'comitan', 'tonala'));
    }

    function terminals(Request $request)
    {
        $date = isset($request->date) ? $request->date : date('Y-m');

        $stores = Store::where('type', '!=', 'c')->get();

        foreach ($stores as $store) {
            $chart = new TestChart;

            $sales = Checkup::whereYear('date_sale', substr($date, 0, 4))
                ->whereMonth('date_sale', substr($date, 5))
                ->where('store_id', $store->id)
                ->get();

            $bbva = $banamex = $clip = $np1 = $np2 = 0;

            foreach ($sales as $sale) {
                $bbva += $sale->bbva_sum;
                $banamex += $sale->banamex_sum;
                $clip += $sale->clip_sum;
                $np1 += $sale->np1_sum;
                $np2 += $sale->np2_sum;
            }

            $data = collect(['BBVA' => round($bbva, 2), 'Banamex' => round($banamex, 2), 'CLIP+' => round($clip, 2), 'Netpay I' => round($np1, 2), 'Netpay II' => round($np2, 2)]);

            $chart->labels($data->keys());
            $chart->dataset('Ventas', 'bar', $data->values())->color(['#1D4B96', '#E03317', '#D67A1D', '#00AAE4', '#00AAE4']);

            ${strtolower($store->tabName)} = $chart;
        }

        return view('admin.terminals', compact('date', 'chiapas', 'soconusco', 'altos', 'gale_tux', 'gale_tapa', 'comitan', 'san_cristobal', 'tonala'));
    }

    function results(Request $request)
    {
        $start = isset($request->start) ? $request->start : date('Y-m-d');
        $end = isset($request->end) ? $request->end : date('Y-m-d');

        $stores = Store::where('type', '!=', 'c')->get();

        foreach ($stores as $store) {
            $chart = new TestChart;

            $bank_accounts = $store->bank_accounts()->where('type', '!=', 'gastos')->get();
            $in = $out = 0;

            foreach ($bank_accounts as $bank_account) {
                // dd($bank_account->account_movements->where('type', 'abono')->whereBetween('added_at', [$start, $end])->pluck('id'));
                $in += $bank_account->account_movements->where('type', 'abono')->whereBetween('added_at', [$start, $end])->sum('amount');
                $out += $bank_account->account_movements->where('type', 'cargo')->whereBetween('added_at', [$start, $end])->sum('amount');
            }

            $chart->labels(['abonos', 'cargos']);
            $chart->dataset('Resultados (dif: ' . number_format($in - $out, 2) . ')', 'bar', [round($in, 2), round($out, 2)])->color(['#1D4B96', '#E03317']);

            ${strtolower($store->tabName)} = $chart;
        }

        return view('admin.results', compact('start', 'end', 'chiapas', 'soconusco', 'altos', 'gale_tux', 'gale_tapa', 'comitan'));
    }

    function buildChart(Store $store, $date)
    {
        $chart = new TestChart;

        $black = Goal::where('year', substr($date, 0, 4) - 1)
            ->where('month', substr($date, 5))
            ->where('store_id', $store->id)
            ->pluck('sale')->first() ?? 0;

        $multiples = Goal::where('year', substr($date, 0, 4))->where('month', substr($date, 5))
            ->where('store_id', $store->id)
            ->select('star', 'golden', 'days')
            ->first();

        $star = $black * ($multiples->star ?? 0);
        $golden = $star * ($multiples->golden ?? 0);
        $workdays = $multiples->days ?? 31;
        $currentMonth = substr($date, 5) == date('m');

        $sales = Sale::whereYear('date_sale', substr($date, 0, 4))
            ->whereMonth('date_sale', substr($date, 5))
            ->where('store_id', $store->id)
            ->with('checkup:id,notes')
            ->get()
            ->keyBy('date_sale');
            // if ($store->id == 5) {
            //   dd($sales);
            // }

        $keys = $sales->keys();
        $keys->transform(function ($item, $key) { return substr($item, -2);});

        $chart->labels($keys->push('Siguiente'));
        $chart->dataset('Ventas Totales ', 'line', $this->getAllSalesArray($sales))->options(['borderColor' => '#E03317', 'fill' => false]);
        $chart->dataset('Ventas sin SterenCard ', 'line', $this->getPublicArray($sales))->options(['borderColor' => '#E69DF8', 'fill' => false]);
        $chart->dataset('Punto negro ', 'line', $this->getPointArray($black, $sales, $workdays, $currentMonth))->options(['borderColor' => '#000000', 'fill' => false]);
        $chart->dataset('Estrella ', 'line', $this->getPointArray($star, $sales, $workdays, $currentMonth))->options(['borderColor' => '#0DAC2A', 'fill' => false]);
        $chart->dataset('Estrella dorada ', 'line', $this->getPointArray($golden, $sales, $workdays, $currentMonth))->options(['borderColor' => '#ACAC0D', 'fill' => false]);

        return $chart;
    }

    function getPointArray($point, $sales, $workdays, $currentMonth)
    {
        $i = $salesSum = 0;
        $returned_sales = [];
        foreach ($sales as $sale) {
            array_push($returned_sales, max(round(($point - $salesSum)/($workdays - $i), 2), 0));
            $i += 1;
            $salesSum += $sale->public + $sale->checkup->notesSum/1.16;
        }
        if ($workdays - $i == 0) {
          $div = 1;
        }else {
          $div = $workdays - $i;
        }

        array_push($returned_sales, $currentMonth ? max(round(($point - $salesSum)/($div), 2), 0):0);

        return $returned_sales;
    }

    function getAllSalesArray($sales)
    {
        $values = [];

        foreach ($sales as $sale) {
          $sale = number_format($sale->public + $sale->checkup->notesSum/1.16, 2, '.','');
          array_push($values, $sale);
        }

        return $values;
    }

    function getPublicArray($sales)
    {
        $values = [];

        foreach ($sales as $sale) {
            array_push($values, $sale->public);
        }

        return $values;
    }

    function getSalesSum($store_id, $date)
    {
        return Sale::where('store_id', $store_id)
            ->whereYear('date_sale', substr($date, 0,4))
            ->whereMonth('date_sale', substr($date, 5, 2))
            ->with('checkup:id,notes')
            ->get()
            ->sum(function ($sale) {
                return ($sale->public + $sale->checkup->notesSum/1.16);
            });
    }
}
