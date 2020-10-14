<?php

namespace App\Imports;

use App\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows->splice(1, $rows->count() - 6) as $row) 
        {
            // dd($row[0], $row[2], $row[5], $row[6], $row[7], $row[8]);

            if ($product = Product::where('code', $row[0])->first()) {
                $product->update([
                    'status' => $row[6],
                    'quantity' => $row[7],
                    'price' => $row[8],
                ]);
            } else {
                Product::create([
                    'code' => $row[0],
                    'description' => $row[2],
                    'family' => $row[5],
                    'status' => $row[6],
                    'quantity' => $row[7],
                    'price' => $row[8],
                ]);
            }
        }
    }
}
