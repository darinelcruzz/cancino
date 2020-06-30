<?php

namespace App\Http\Controllers;

use App\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    function index()
    {
        $websites = Website::where('store_id', getStore()->id)->get();
        return view('websites.index', compact('websites'));
    }

    function create()
    {
        return view('websites.create');
    }

    function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'url' => 'required',
            'username' => 'required',
            'password' => 'required',
            'store_id' => 'required',
        ]);

        Website::create($attributes);

        return redirect(route('websites.index'));
    }

    function show(Website $website)
    {
        //
    }

    function edit(Website $website)
    {
        return view('websites.edit', compact('website'));
    }

    function update(Request $request, Website $website)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'url' => 'required',
            'username' => 'required',
            'password' => 'required',
            'store_id' => 'required',
        ]);

        $website->update($attributes);

        return redirect(route('websites.index'));
    }

    function destroy(Website $website)
    {
        //
    }
}
