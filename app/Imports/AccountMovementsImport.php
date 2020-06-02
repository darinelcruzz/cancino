<?php

namespace App\Imports;

use App\AccountMovement;
use App\Concept;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class AccountMovementsImport implements ToCollection
{
    function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if (substr($row[1], 0, strpos($row[1], '/')) != 'CHEQUE PAGADO NO.') {
                $account_movement = AccountMovement::create([
                    'added_at' => $row[0],
                    'concept' => $row[1],
                    'type' => $row[2] == '' ? 'abono' : 'cargo',
                    'amount' => $row[2] + $row[3],
                    'bank_account_id' => $row[5],
                    'expenses_group_id' => null,
                    'provider_id' => null,
                ]);

                $concept = Concept::where('description', $account_movement->clean_concept)->first();

                if ($concept) {
                    $account_movement->update([
                        'provider_id' => $concept->provider_id,
                        'expenses_group_id' => $concept->provider->expenses_group_id,
                        'concept' => $concept->description
                    ]);
                }
            }

        }
    }
}