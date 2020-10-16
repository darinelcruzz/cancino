<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\{ProductsExport, ProductsCSVExport, NotDiscontinuedProductsExport, DiscontinuedProductsExport};
use App\Imports\ProductBarcodesImport;

class ProductController extends Controller
{
    function index()
    {
        $products = Product::with('counts')->get();
        return view('products.index', compact('products'));
    }

    function export($format = 'excel')
    {
        if($format == 'csv') {
            return Excel::download(new ProductsCSVExport, 'productos.csv', \Maatwebsite\Excel\Excel::CSV);
        }

        if($format == 'no-descontinuado') {
           return Excel::download(new NotDiscontinuedProductsExport, 'enlinea.xlsx'); 
        }

        if($format == 'descontinuado') {
           return Excel::download(new DiscontinuedProductsExport, 'descontinuados.xlsx'); 
        }
        
        return Excel::download(new ProductsExport, 'productos.xlsx');
    }

    function import(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'excel' => 'required',
        ]);

        Excel::import(new ProductBarcodesImport, $request->file('excel'));

        return redirect(route('product.index'));
    }
}
