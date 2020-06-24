<?php

namespace App\Http\Controllers;

use App\{ServicePayment, Service};
use Illuminate\Http\Request;
use Jenssegers\Date\Date;

class ServicePaymentController extends Controller
{
    function index()
    {
        $payments = ServicePayment::all();
        return view('services.payments.index', compact('payments'));
    }

    function create(Service $service)
    {
        return view('services.payments.create', compact('service'));
    }

    function store(Request $request, Service $service)
    {
        $validated = $request->validate([
            'amount' => 'required',
            'paid_at' => 'required',
            'method' => 'required',
        ]);

        $service->payments()->create($validated);

        $invoiced_at = Date::createFromFormat('Y-m-d', $service->invoiced_at);
        $expired_at = Date::createFromFormat('Y-m-d', $service->expired_at);

        $service->update([
            'invoiced_at' => $invoiced_at->add($service->period . " month"),
            'expired_at' => $expired_at->add($service->period . " month")
        ]);

        return redirect(route('service.show', $service));
    }

    function show(ServicePayment $servicePayment)
    {
        //
    }

    function edit(ServicePayment $servicePayment)
    {
        //
    }

    function update(Request $request, ServicePayment $servicePayment)
    {
        //
    }

    function destroy(ServicePayment $servicePayment)
    {
        //
    }
}
