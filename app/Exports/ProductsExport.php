<?php

namespace App\Exports;

use App\Product;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProductsExport implements FromView
{
    function view(): View
    {
        return view('exports.products.excel', [
            'products' => Product::with('counts')->get()
        ]);
    }
}
