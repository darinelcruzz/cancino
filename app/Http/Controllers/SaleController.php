<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Goal;
use App\Date;
use App\Store;
use App\Charts\TestChart;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    function index()
    {
        $sales = Sale::where('store_id', auth()->user()->store_id)->whereNull('date_deposit')->get();
        return view('sales.index', compact('sales'));
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

        return redirect(route('admin.sales'));
    }

    function show(Request $request)
    {
        $date = isset($request->date) ? $request->date: date('Y-m');
        $chart = new TestChart;
        $sales = Sale::where('store_id', auth()->user()->store_id)
            ->whereMonth('date_sale', substr($date, 5))
            ->whereYear('date_sale', substr($date, 0, 4))
            ->selectRaw('public, DATE_FORMAT(date_sale, "%d") as day')
            ->get();

        $public = $sales->keyBy('day')->map(function ($sale) {
            return $sale->public;
        });
        $black = $sales->keyBy('day')->map(function ($sale) use ($date) {
            return $sale->getScale($date)[0];
        });
        $star = $sales->keyBy('day')->map(function ($sale) use ($date) {
            return $sale->getScale($date)[1];
        });
        $golden = $sales->keyBy('day')->map(function ($sale) use ($date) {
            return $sale->getScale($date)[2];
        });

        $chart->labels($public->keys());
        $chart->dataset('Ventas a público', 'line', $public->values())->options(['borderColor' => '#E03317', 'fill' => false]);
        $chart->dataset('Punto negro', 'line', $black->values())->options(['borderColor' => '#000000', 'fill' => false]);
        $chart->dataset('Estrella', 'line', $star->values())->options(['borderColor' => '#0DAC2A', 'fill' => false]);
        $chart->dataset('Dorada', 'line', $golden->values())->options(['borderColor' => '#ACAC0D', 'fill' => false]);

            $total = Store::where('id', auth()->user()->store_id)->get()->first()->getSalesSum($date);
            $sumBlack = Store::where('id', auth()->user()->store_id)->get()->first()->getPoint($date);
            $sumStar = Store::where('id', auth()->user()->store_id)->get()->first()->getStar($date);
            $sumGolden = Store::where('id', auth()->user()->store_id)->get()->first()->getGolden($date);

        return view('sales.show', compact('sales', 'date', 'perDay', 'chart', 'total', 'sumBlack', 'sumStar', 'sumGolden'));
    }

    function edit(Sales $sales)
    {
        $sales = Sale::where()
        >update($request->all());
    }

    function update(Request $request, Sales $sales)
    {
        //
    }

    function deposit(Request $request)
    {
        Sale::find($request->id)->update($request->all());
        return back();
    }
}
