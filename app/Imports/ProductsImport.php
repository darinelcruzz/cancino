<?php

namespace App\Imports;

use App\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductsImport implements ToCollection
{
    function collection(Collection $rows)
    {
        foreach ($rows->splice(1, $rows->count() - 6) as $row) 
        {
            if ($product = Product::where('code', $row[0])->first()) {
                $product->update([
                    'status' => $row[3],
                    'quantity' => $row[4],
                    'price' => $row[5],
                ]);
            } else {
                if ($row[3] != 'VAR/FRA') {
                    Product::create([
                        'code' => $row[0],
                        'description' => $row[1],
                        'family' => $row[2],
                        'status' => $row[3],
                        'quantity' => $row[4],
                        'price' => $row[5],
                    ]);
                }
            }
        }
    }
}
