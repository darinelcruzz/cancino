<?php

namespace App\Exports;

use App\Product;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProductsCSVExport implements FromView
{
    function view(): View
    {
        return view('exports.products.csv', [
            'products' => Product::with('counts')->get()
        ]);
    }
}