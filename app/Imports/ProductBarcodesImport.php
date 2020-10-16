<?php

namespace App\Imports;

use App\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ProductBarcodesImport implements ToCollection, WithChunkReading, ShouldQueue
{
    public function collection(Collection $rows)
    {
        foreach ($rows->splice(1) as $row) 
        {
            if ($product = Product::where('code', $row[0])->first()) {
                $product->update([
                    'barcode' => $row[1],
                ]);
            }
        }
    }

    public function chunkSize(): int
    {
        return 700;
    }
}
