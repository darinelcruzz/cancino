<?php

namespace App\Http\Controllers;

use App\{Service, Store};
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
            }
        });

        // dd($services);

        return view('services.index', compact('services'));
    }

    function create()
    {
        $stores = Store::pluck('name', 'id')->toArray();
        return view('services.create', compact('stores'));
    }

    function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'group' => 'required',
            'amount' => 'required',
            'invoiced_at' => 'required',
            'expired_at' => 'required',
            'period' => 'required',
            'store_id' => 'required',
        ]);

        Service::create($request->except('store_id') + ['serviceable_type' => 'App\Store', 'serviceable_id' => $request->store_id]);

        return redirect(route('services.index'));
    }

    function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    function mark(Service $service)
    {
        $service->update(['status' => 'impreso']);

        return redirect(route('services.index'));
    }

    function edit(Service $service)
    {
        //
    }

    function update(Request $request, Service $service)
    {
        
    }

    function destroy(Service $service)
    {
        //
    }
}
