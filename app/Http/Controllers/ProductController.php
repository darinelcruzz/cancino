<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;

class ProductController extends Controller
{
    function index()
    {
        $products = Product::with('counts')->get();
        return view('products.index', compact('products'));
    }

    function create()
    {
        //
    }

    function store(Request $request)
    {
        //
    }

    function show(Product $product)
    {
        //
    }

    function edit(Product $product)
    {
        //
    }

    function update(Request $request, Product $product)
    {
        //
    }

    function export()
    {
        return Excel::download(new ProductsExport, 'productos.csv', \Maatwebsite\Excel\Excel::CSV);
    }

    function destroy(Product $product)
    {
        //
    }
}
