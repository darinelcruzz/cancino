<?php

namespace App\Http\Controllers;

use App\{Commision, Employer, Goal, Date, Store};
use Illuminate\Http\Request;

class CommisionController extends Controller
{
    function index(Request $request)
    {
        $date = isset($request->date) ? $request->date : date('Y-m');
        $month = fdate($date, 'm', 'Y-m');
        $year = fdate($date, 'Y', 'Y-m');

        if (auth()->user()->store_id == 1) {
            $goals = Goal::where('year', $year)->where('month', $month)->pluck('id');
        }else {
            $goals = Goal::where('store_id', auth()->user()->store_id)->where('year', $year)->where('month', $month)->pluck('id');
        }

        $stores = Commision::whereIn('goal_id', $goals)->get()->groupBy('goal_id');
        $stores->transform(function ($item, $key) {
            return $item->groupBy('employer_id');
        });

        return view('commisions.index', compact('date', 'stores'));
    }

    function create(Store $store)
    {
        $date = session('date') ? session('date') : date('Y-m');

        // dd($date);

        $employers = Employer::where('status', '!=', 'inactivo')->where('commision', 1)->where('store_id', $store->id)->get()->pluck('id', 'nickname');
        $goal = Goal::where('store_id', $store->id)->where('year', substr($date, 0, 4) - 1)->where('month', substr($date, 5))->get()->last()->sale;
        $now = Goal::where('store_id', $store->id)->where('year', substr($date, 0, 4))->where('month', substr($date, 5))->get()->last();

        return view('commisions.create', compact('employers', 'goal', 'now', 'store', 'date'));
    }

    function store(Request $request)
    {
        foreach ($request->sellers as $seller) {
            foreach ($seller as $goal) {
                Commision::create($goal);
            }
        }

        return redirect(route('commision.index'));
    }

    function show(Request $request, Store $store)
    {
        $date = $request->date ? $request->date: date('Y-m');

        $goals = Goal::where('store_id', $store->id)->where('year', substr($date, 0, 4))->where('month', substr($date, 5))->get();
        $past_goal = Goal::where('store_id', $store->id)->where('year', substr($date, 0, 4) - 1)->where('month', substr($date, 5))->get()->first();

        // dd($goals->count());

        if ($goals->count()) {
            $msg = '';
            $goal = $goals->last();
            if ($goal->commisions->count() == 0) return redirect(route('commision.create', $store))->with('date', $date);
        } else {
            $msg = 'No se han establecido metas para este mes';
            $goal = null;
        }
        
        return view('commisions.show', compact('store', 'date', 'msg', 'goal', 'past_goal'));

    }

    function edit(Goal $goal, $week)
    {
        $week = Commision::where('goal_id', $goal->id)->where('week', $week)->get();

        return view('commisions.edit', compact('week'));
    }

    function extras(Goal $goal)
    {
        return view('commisions.extras', compact('goal'));
    }

    function add(Request $request, Goal $goal)
    {
        $goal->update($request->all());

        return redirect(route('commision.index'));
    }

    function update(Request $request)
    {
        foreach ($request->sales as $id => $commision) {
            Commision::find($id)->update($commision);
        }

        return redirect(route('commision.index'));
    }

    function report(Goal $goal)
    {
        $past_goal = Goal::where('store_id', $goal->store_id)->where('month', $goal->month)->where('year', $goal->year-1)->first();

        $commisions_by_employee = Commision::where('goal_id', $goal->id)->get()->groupBy('employer_id');
        $commisions_complete = Commision::where('goal_id', $goal->id)->get();

        return view('commisions.report', compact('goal', 'past_goal', 'commisions_by_employee', 'commisions_complete'));
    }

    function destroy(Commision $commision)
    {
        //
    }
}
