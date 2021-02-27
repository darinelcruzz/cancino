<?php

namespace App\Http\Controllers;

use App\{Sale, Goal, Date, Store, Checkup};
use App\Charts\TestChart;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    function index()
    {
        $date = date('Y-m');
        $pendings = Sale::where('store_id', auth()->user()->store_id)->whereNull('date_deposit')->get();
        $currents = Sale::where('store_id', auth()->user()->store_id)->whereNotNull('date_deposit')->orderBy('date_sale', 'desc')->take(10)->get();
        return view('sales.index', compact('pendings', 'currents'));
    }

    function create()
    {
        return view('sales.create');
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'date_sale' => 'required',
            'cash' => 'required',
            'total' => 'required',
            'public' => 'required',
            'store_id' => 'required',
        ]);

        $sale = Sale::create($request->all());

        $sale->notify(new \App\Notifications\SaleDay());

        return redirect(route('helper.sales'));
    }

    function show(Request $request)
    {
        $date = isset($request->date) ? $request->date: date('Y-m');
        $chart = new TestChart;

        $black = Goal::where('year', substr($date, 0, 4) - 1)
            ->where('month', substr($date, 5))
            ->where('store_id', auth()->user()->store_id)
            ->pluck('sale')->first();

        $multiples = Goal::where('year', substr($date, 0, 4))->where('month', substr($date, 5))
            ->where('store_id', auth()->user()->store_id)
            ->select('star', 'golden', 'days')
            ->first()
            ->toArray();

        $star = $black * $multiples['star'];
        $golden = $star * $multiples['golden'];
        $workdays = $multiples['days'];
        $currentMonth = substr($date, 5) == date('m');

        $sales = Sale::whereYear('date_sale', substr($date, 0, 4))
            ->whereMonth('date_sale', substr($date, 5))
            ->where('store_id', auth()->user()->store_id)
            ->selectRaw('public, DATE_FORMAT(date_sale, "%d") as day')
            ->get()
            ->keyBy('day');

        $keys = $sales->keys()->push('Siguiente');
        $chart->labels($keys);
        $chart->dataset('Ventas a público', 'line', $sales->pluck('public')->values())->options(['borderColor' => '#E03317', 'fill' => false]);
        $chart->dataset('Punto negro', 'line', $this->getPointArray($black, $sales, $workdays, $currentMonth))->options(['borderColor' => '#000000', 'fill' => false]);
        $chart->dataset('Estrella', 'line', $this->getPointArray($star, $sales, $workdays, $currentMonth))->options(['borderColor' => '#0DAC2A', 'fill' => false]);
        $chart->dataset('Estrella dorada', 'line', $this->getPointArray($golden, $sales, $workdays, $currentMonth))->options(['borderColor' => '#ACAC0D', 'fill' => false]);

        $total = $this->getSalesSum(auth()->user()->store_id, $date);
        $sumBlack = Store::where('id', auth()->user()->store_id)->get()->first()->getPoint($date);
        $sumStar = Store::where('id', auth()->user()->store_id)->get()->first()->getStar($date);
        $sumGolden = Store::where('id', auth()->user()->store_id)->get()->first()->getGolden($date);

        return view('sales.show', compact('date', 'chart', 'total', 'sumBlack', 'sumStar', 'sumGolden'));
    }

    function edit(Sale $sale)
    {
        return view('sales.edit', compact('sale'));
    }

    function update(Request $request)
    {
        $request->validate([
            'date_sale' => 'required',
        ]);
        $sale = Sale::find($request->id);
        $sale->update($request->except(['sc_dif']));

        $checkup = Checkup::find($sale->checkup_id);
        $checkup->update([
            'date_sale' => $sale->date_sale,
            'retention' => $sale->retention,
            'sc_dif' => $request->sc_dif
        ]);

        return redirect(route('admin.deposits'));
    }

    function deposit(Request $request)
    {
        Sale::find($request->id)->update($request->all());
        return back();
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
        array_push($returned_sales, $currentMonth ? max(round(($point - $salesSum)/($workdays - $i), 2), 0):0);

        return $returned_sales;
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
