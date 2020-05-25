<?php

namespace App\Http\Controllers;

use App\{Loan, Invoice, Store};
use Illuminate\Http\Request;

class LoanController extends Controller
{
    function groups()
    {
        $lent = Loan::where('to', auth()->user()->store_id)->where('status', '!=', 'facturado')->where('status', '!=', 'cancelado')->get();
        $borrowed = Loan::where('from', auth()->user()->store_id)->where('status', '!=', 'facturado')->where('status', '!=', 'cancelado')->get();
        $invoiceLent = Invoice::where('to', auth()->user()->store_id)->get();
        $invoiceBorrowed = Invoice::where('from', auth()->user()->store_id)->get();

        return view('loans.groups', compact('lent', 'borrowed', 'invoiceLent', 'invoiceBorrowed'));
    }

    function index()
    {
        $lent = Loan::where('to', auth()->user()->store_id)->where('status', 'facturado')->get();
        $borrowed = Loan::where('from', auth()->user()->store_id)->where('status', 'facturado')->get();

        return view('loans.index', compact('lent', 'borrowed'));
    }

    function create()
    {
        $recent_loans = Loan::where('status', 'solicitado')
                    ->where('to', auth()->user()->store_id)
                    ->get()
                    ->groupBy('from');

        return view('loans.create', compact('recent_loans'));
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'from' => 'required',
            'item' => 'required',
            'quantity' => 'required',
            'authorized_by' => 'required',
            'received_by' => 'required',
        ]);

        Loan::create($request->all());

        return redirect(route('loans.create'));
    }

    function show(Loan $loan)
    {
        return view('loans.show', compact('loan'));
    }

    function print(Store $store)
    {
        $loans = Loan::where('status', 'solicitado')->where('to', $store->id)->get();

        return view('loans.print', compact('loans'));
    }

    function details(Loan $loan)
    {
        $invoice = Loan::where('invoice', $loan->invoice)->where('from', $loan->from)->get();
        $info = $loan->invoice . ' de ' . $loan->fromr->name . ' a ' . $loan->tor->name;

        return view('loans.invoice', compact('invoice', 'info'));
    }

    function agree(Loan $loan)
    {
        if ($loan->status == 'solicitado') {
            $loan->update(['status' => 'aceptado']);
        }elseif ($loan->status == 'aceptado') {
            $loan->update(['status' => 'recibido']);
        }
        return redirect(route('loans.groups'));
    }

    function pay(Request $request)
    {
        $loan = Loan::find($request->id);
        $loan->update($request->all());
        $loan->update(['status' => 'devuelto']);

        return back();
    }
}
