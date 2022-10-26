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
            // if ($row[6] == 'Descontinuado' && $row[7] != 0) {
            //     if ($product = Product::where('code', $row[0])->first()) {
            //         $product->update([
            //             'status' => $row[6],
            //             'quantity' => $row[7],
            //             'price' => $row[8],
            //         ]);
            //     } else {
                    if ($row[3] != 'VAR/FRA') {
                        Product::create([
                            'code' => $row[0],
                            'description' => $row[2],
                            'family' => $row[3],
                            'status' => $row[6],
                            'quantity' => $row[7],
                            'price' => $row[8],
                        ]);
                    }
                // }
            // }
        }
    }
}
