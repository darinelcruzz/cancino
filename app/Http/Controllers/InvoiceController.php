<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Loan;
use App\Store;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    function index()
    {
        //
    }

    function create(Store $store)
    {
        $items = Loan::where('from', auth()->user()->store_id)->where('status', 'recibido')
                ->where('to', $store->id)->get();

        return view('invoices.create', compact('items', 'store'));
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'folio' => 'required',
            'amount' => 'required',
            'date' => 'required',
            'items' => 'required',
        ]);

        $invoice = Invoice::create($request->except('items', 'example1_length'));

        foreach ($request->items as $item_id) {
            $item = Loan::find($item_id);
            $item->update([
                'invoice_id' => $invoice->id,
                'status' => 'facturado'
            ]);
        }
        return redirect(route('loans.index'));
    }

    function show(Invoice $invoice)
    {
        $items = Loan::where('invoice_id', $invoice->id)->get();

        return view('invoices.show', compact('invoice', 'items'));
    }

    function pay(Invoice $invoice)
    {
        $invoice->update([
            'status' => 'pagada',
            'payed_at' => date("Y-m-d")
        ]);

        return redirect(route('admin.loans', [$invoice->from]));
    }

    function pos(Request $request, Invoice $invoice)
    {
        $this->validate($request, [
            'pos' => 'required',
            'pos_at' => 'required',
        ]);

        $invoice->update($request->all());

        return redirect(route('admin.loans', [$invoice->from]));
    }

}
