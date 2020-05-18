<?php

namespace App\Imports;

use App\Check;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ChecksImport implements ToCollection
{
    function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $check = Check::create([
                'folio' => $row[0],
                'emitted_at' => $row[1],
                'amount' => $row[2],
                'concept' => $row[3],
                'observations' => $row[4],
                'created_at' => $row[5],
                'updated_at' => $row[6],
                'name' => $row[7],
                'bank_account_id' => $row[8],
            ]);

            $check->account_movement->update([
                'expenses_group_id' => $row[9],
                'provider_id' => $row[10],
            ]);
        }
    }
}