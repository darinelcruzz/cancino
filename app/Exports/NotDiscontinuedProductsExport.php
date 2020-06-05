<?php

namespace App\Exports;

use App\Product;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class NotDiscontinuedProductsExport implements FromView
{
    function view(): View
    {
        return view('exports.products.not_discontinued', [
            'products' => Product::where('status', '!=', 'Descontinuado')
            	->with('counts')
	            ->get()
	            ->filter(function($item) {
			        return $item->difference != 0;
			    })
        ]);
    }
}
