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
            'daysprofessional' => 'required',
        ]);

        foreach (Store::where('type', '!=', 'c')->get() as $store) {
            $store->goals()->create($request->only(['month', 'year']) + 
                ['star' => $store->star, 'golden' => $store->golden, 
                'days' => $store->type == 'p' ? $request->daysprofessional: $request->daysshop]
            );
        }

        return redirect(route('admin.goals'));
    }

    function edit($month, $year)
    {
        $stores = Store::where('type', '!=', 'c')->get();
        return view('goals.update', compact('stores', 'month', 'year'));
    }

    function update(Request $request)
    {
        foreach (Store::whereIn('type', ['p', 's'])->get() as $store) {
            $goal = $store->goals->where('month', $request->month)->where('year', $request->year)->first();
            
            $goal->update([
                'sale' => $request->{'sale' . $store->id}, 
                'point' => $request->{'point' . $store->id}
            ]);
        }

        return redirect(route('admin.goals'));
    }
}
