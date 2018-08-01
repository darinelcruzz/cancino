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
        $binnacles = Binnacle::All();

        return view('binnacles.index', compact('binnacles'));
    }

    function create()
    {
        $clients = Client::pluck('business', 'id')->toArray();
        return view('binnacles.create', compact('clients'));
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'client_id' => 'required',
            'date' => 'required',
            'reason' => 'required',
            'observations' => 'required',
            'document' => 'sometimes|required',
        ]);

        $binnacle = Binnacle::create($request->except('document'));

        $path_to_pdf = Storage::putFileAs(
            "public/bills", $request->file("document"), $request->file("document")->getClientOriginalName()
        );

        $binnacle->update([
            'document' => $path_to_pdf,
        ]);

        return redirect(route('binnacles.index'));
    }

    function show(Binnacle $binnacle)
    {
        //
    }

    function edit(Binnacle $binnacle)
    {
        //
    }

    function update(Request $request, Binnacle $binnacle)
    {
        //
    }

    function destroy(Binnacle $binnacle)
    {
        //
    }
}
