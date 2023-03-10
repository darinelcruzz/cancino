<?php

namespace App\Exports;

use App\Product;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class WireProductsExport implements FromView
{
    function view(): View
    {
        return view('exports.products.not_discontinued', [
            'products' => Product::where('family', 'like', '%CAB/%')
            	->with('counts')
	            ->get()
        ]);
    }
}
