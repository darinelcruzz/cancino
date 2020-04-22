<?php

namespace App\Http\Controllers;

use App\{Checkup, Store, Sale, OtherSale, User};
use Illuminate\Http\Request;
use App\Charts\TestChart;

class CheckupController extends Controller
{
    function index()
    {
        $checkups = Checkup::where('store_id', auth()->user()->store_id)
            ->orderBy('id', 'desc')
            ->get()
            ->take(60);

        return view('checkups.index', compact('checkups'));
    }

    function create()
    {
        return view('checkups.create');
    }

    function store(Request $request)
    {
        $request->validate([
            'cash' => 'required',
            'public' => 'required',
        ]);

        $checkup = Checkup::create($request->except(['user_id', 'public']));

        $sale = Sale::create([
            'date_sale' => $checkup->date_sale,
            'checkup_id' => $checkup->id,
            'cash' => $checkup->cash_sums['c'],
            'public' => $request->public,
            'total' => round(($checkup->cash_sums['c'] + $checkup->card_sums['c'] + $checkup->transfer_sums['c'] + $checkup->creditSum - $checkup->canceledSum)/1.16,2),
            'user_id' => $request->user_id,
            'store_id' => $request->store_id
        ]);

        if ($request->credit != null) {
            foreach ($request->credit as $credit) {
                $creditSale = OtherSale::create([
                    'checkup_id' => $checkup->id,
                    'folio' => $credit['f'],
                    'client_id' => $credit['c'],
                    'amount' => $credit['a']
                ]);
            }
        }

        $sale->notify(new \App\Notifications\SaleDayStore());

        return redirect(route('checkup.index'));
    }

    function show(Checkup $checkup)
    {
        if(auth()->user()->can('report', $checkup)) return view('checkups.show', compact('checkup'));

        return back();

    }

    function edit(Checkup $checkup)
    {
        return view('checkups.edit', compact('checkup'));
    }

    function update(Request $request, Checkup $checkup)
    {
        $request->validate([
            'cash' => 'sometimes|required',
        ]);

        $checkup->update($request->except(['user_id', 'public', 'ret_date']));

        $sale = Sale::where('checkup_id', $checkup->id)->get()->first();

        $sale->update([
            'cash' => $checkup->cash_sums['c'],
            'total' => round(($checkup->cash_sums['c'] + $checkup->card_sums['c'] + $checkup->transfer_sums['c'] + $checkup->creditSum - $checkup->canceledSum)/1.16,2)
        ]);

        return redirect(route('admin.checkups'));
    }

    function updateStatus(Checkup $checkup, $status)
    {
        $checkup->update(['status' => $status]);

        return redirect(route('helper.checkups'));
    }

    function report(Checkup $checkup)
    {
        if(auth()->user()->can('report', $checkup)) return view('checkups.report', compact('checkup'));

        return back();
    }

    function cards(Request $request)
    {
        $chart = new TestChart;

        $date = isset($request->date) ? $request->date : date('Y-m');

        $sales = Checkup::whereYear('date_sale', substr($date, 0, 4))
            ->whereMonth('date_sale', substr($date, 5))
            ->where('store_id', auth()->user()->store_id)
            ->get();

        $bbva = $banamex = $clip = 0;

        foreach ($sales as $sale) {
            $bbva += $sale->bbva_sum;
            $banamex += $sale->banamex_sum;
            $clip += $sale->clip_sum;
        }

        $data = collect(['BBVA' => round($bbva, 2), 'Banamex' => round($banamex, 2), 'CLIP+' => round($clip, 2)]);

        $chart->labels($data->keys());
        $chart->dataset('Ventas', 'bar', $data->values())->color(['#1D4B96', '#E03317', '#D67A1D']);

        return view('checkups.cards', compact('date', 'chart'));
    }
}
