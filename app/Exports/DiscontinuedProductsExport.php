<?php

namespace App\Exports;

use App\Product;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DiscontinuedProductsExport implements FromView
{
    function view(): View
    {
        return view('exports.products.excel', [
            'products' => Product::where('status', 'Descontinuado')
                ->where('quantity', '>', 0)
            	->with(['counts' => function ($query) {
                    $query->where('quantity', '>', 0);
                }])
	            ->get()
        ]);
    }
}