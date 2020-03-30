<?php

namespace App\Exports;

use App\Count;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CountsExport implements FromView
{
    function view(): View
    {
        return view('exports.counts', [
            'counts' => Count::with('product', 'location', 'user')->get()
        ]);
    }
}
