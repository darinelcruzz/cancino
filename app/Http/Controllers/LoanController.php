<?php

namespace App\Http\Controllers;

use App\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    function index()
    {
        $lent = Loan::where('to', auth()->user()->store_id)->get();
        $borrowed = Loan::where('from', auth()->user()->store_id)->get();

        return view('loans.index', compact('lent', 'borrowed'));
    }

    function create()
    {
        $recients = Loan::where('status', 'solicitado')
                    ->where('to', auth()->user()->store_id)->get();
        return view('loans.create', compact('recients'));
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'from' => 'required',
            'item' => 'required',
            'quantity' => 'required',
        ]);

        Loan::create($request->all());

        return redirect(route('loans.create'));
    }

    function show(Loan $loan)
    {
        return view('loans.show', compact('loan'));
    }

    function agree(Loan $loan)
    {
        if ($loan->status == 'solicitado') {
            $loan->update(['status' => 'aceptado']);
        }elseif ($loan->status == 'aceptado') {
            $loan->update(['status' => 'recibido']);
        }elseif ($loan->status == 'devuelto') {
            if (!$loan->rest) {
                $loan->update(['status' => 'pagado']);
            }else {
                $loan->update(['status' => 'parcialmente']);
            }
        }
        return redirect(route('loans.index'));
    }

    function pay(Request $request)
    {
        $loan = Loan::find($request->id);
        $loan->update($request->all());
        $loan->update(['status' => 'devuelto']);

        return back();
    }

    function invoice(Request $request)
    {

    }

    function destroy(Loan $loan)
    {
        //
    }
}
