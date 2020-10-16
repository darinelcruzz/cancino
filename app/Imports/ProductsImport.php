<?php

namespace App\Imports;

use App\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ProductsImport implements ToCollection, WithChunkReading
{
    public function collection(Collection $rows)
    {
        foreach ($rows->splice(1, $rows->count() - 6) as $row) 
        {
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

    public function chunkSize(): int
    {
        return 750;
    }
}
