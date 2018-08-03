<?php

namespace App\Http\Controllers;

use App\Binnacle;
use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BinnacleController extends Controller
{
    function index()
    {
        $activitys = Binnacle::where('status', 'realizada')->where('user_id', auth()->user()->id)->get();
        $plannings = Binnacle::where('status', 'pendiente')->where('user_id', auth()->user()->id)->get();

        return view('binnacles.index', compact('activitys', 'plannings'));
    }

    function planning()
    {
        $clients = Client::pluck('business', 'id')->toArray();
        return view('binnacles.planning', compact('clients'));
    }

    function activity()
    {
        $clients = Client::pluck('business', 'id')->toArray();
        return view('binnacles.activity', compact('clients'));
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'client_id' => 'required',
            'date' => 'required',
            'reason' => 'sometimes|required',
            'observations' => 'sometimes|required',
            'notes' => 'sometimes|required',
            'document' => 'sometimes|required',
        ]);

        $binnacle = Binnacle::create($request->except('document'));

        if ($request->document) {
            $path_to_pdf = Storage::putFileAs(
                "public/bills", $request->file("document"), $request->file("document")->getClientOriginalName()
            );

            $binnacle->update([
                'document' => $path_to_pdf,
            ]);
        }

        return redirect(route('binnacles.index'));
    }

    function show(Binnacle $binnacle)
    {
        //
    }

    function edit(Binnacle $binnacle)
    {
        return view('binnacles.edit', compact('binnacle'));
    }

    function update(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
            'reason' => 'required',
            'observations' => 'sometimes|required',
            'document' => 'sometimes|required'
        ]);

        $binnacle = Binnacle::find($request->id);
        $binnacle->update($request->except('document'));

        if ($request->document) {
            $path_to_pdf = Storage::putFileAs(
                "public/bills", $request->file("document"), $request->file("document")->getClientOriginalName()
            );

            $binnacle->update([
                'document' => $path_to_pdf,
            ]);
        }

        return redirect(route('binnacles.index'));
    }

    function destroy(Binnacle $binnacle)
    {
        //
    }
}
