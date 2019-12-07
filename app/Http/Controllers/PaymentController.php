<?php

namespace App\Http\Controllers;

use App\{Payment, Debt};
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    function create(Debt $debt)
    {
        return view('debts.payments.create', compact('debt'));
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'paid_at' => 'required',
            'method' => 'required',
            'amount' => 'required',
        ]);
        Payment::create($request->all());

        $debt = Debt::find($request->debt_id);
        if ($debt->difference <= 0) {
            $debt->update(['status' => 'pagado']);
        }

        return redirect(route('debts.index'));
    }
}
