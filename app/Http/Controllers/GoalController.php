<?php

namespace App\Http\Controllers;

use App\Goal;
use App\Store;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    function index()
    {
        $dates = Goal::where('store_id', auth()->user()->store_id)->get()->groupBy('month');
        $dates->transform(function ($item, $key) {
            return $item->groupBy('year');
        });
        // dd($dates);

        return view('goals.index', compact('dates'));
    }

    function create()
    {
        return view('goals.create');
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'month' => 'required',
            'year' => 'required',
            'daysshop' => 'required',
        ]);
        $stores = Store::All();
        foreach ($stores as $store) {
            if ($store->type == 'p') {
                $goal = Goal::create($request->except(['daysshop', 'daysprofessional']));
                $goal->update(['star' => $store->star, 'golden' => $store->golden,
                                'store_id' => $store->id, 'days' => $request->daysprofessional]);
            }elseif ($store->type == 's') {
                $goal = Goal::create($request->except(['daysshop', 'daysprofessional']));
                $goal->update(['star' => $store->star, 'golden' => $store->golden,
                                'store_id' => $store->id, 'days' => $request->daysshop]);
            }
        }

        return redirect(route('admin.goals'));
    }

    function show(Goal $goal)
    {
        //
    }

    function edit($month, $year)
    {
        $stores = Store::where('type', '!=', 'c')->get();
        return view('goals.update', compact('stores', 'month', 'year'));
    }

    function update(Request $request)
    {
        $stores = Store::where('type', '!=', 'c')->get();
        foreach ($stores as $store) {
            $sale = $request->{'sale' . $store->id};
            $point = $request->{'point' . $store->id};
            $goal = Goal::where('month', $request->month)->where('year', $request->year)->where('store_id', $store->id)->take(1);
            $goal->update(['sale' => $sale, 'point' => $point]);
        }

        return redirect(route('admin.goals'));
    }

    function destroy(Goal $goal)
    {
        //
    }
}
