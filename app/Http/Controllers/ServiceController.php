<?php

namespace App\Http\Controllers;

use App\{Service, Store, Home};
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    function index()
    {
        $services = Service::all()->each(function ($item, $key) {
            $printed = $item->status == 'impreso' ? 'impreso ': '';
            if ($item->status != 'impreso vencido') {
                if (date('Y-m-d') >= $item->invoiced_at && date('Y-m-d') <= $item->expired_at) {
                    $item->update(['status' => 'pendiente']);
                } else if(date('Y-m-d') > $item->expired_at) {
                    $item->update(['status' => $printed . 'vencido']);
                }

                if ($printed == 'impreso ') {
                    $item->update(['status' => 'impreso' . (date('Y-m-d') > $item->expired_at ? ' vencido': '')]);
                }
            }
        });

        // dd($services);

        return view('services.index', compact('services'));
    }

    function create()
    {
        $stores = Store::all()->pluck('modelAndName', 'modelInitial');
        $homes = Home::all()->pluck('modelAndName', 'modelInitial');
        return view('services.create', compact('stores', 'homes'));
    }

    function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'description' => 'required',
            'group' => 'required',
            'amount' => 'required',
            'invoiced_at' => 'required',
            'expired_at' => 'required',
            'period' => 'required',
            'store_id' => 'required',
        ]);

        Service::create($request->except('store_id') + [
            'serviceable_type' => substr($request->store_id, 0, 1) == 'S' ? 'App\Store': 'App\Home',
            'serviceable_id' => substr($request->store_id, 1)
        ]);

        return redirect(route('services.index'));
    }

    function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    function mark(Service $service)
    {

        $service->update(['status' => 'impreso' . (date('Y-m-d') > $service->expired_at ? ' vencido': '')]);

        return redirect(route('services.index'));
    }

    function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    function update(Request $request, Service $service)
    {
        $service->update($request->validate([
            'description' => 'required',
            'group' => 'required',
            'amount' => 'required',
            'invoiced_at' => 'required',
            'expired_at' => 'required',
            'period' => 'required',
        ]));

        return redirect(route('services.index'));
    }

    function destroy(Service $service)
    {
        //
    }
}
