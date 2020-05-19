<?php

namespace App\Imports;

use App\AccountMovement;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class AccountMovementsImport implements ToCollection
{
    function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if (substr($row[1], 0, strpos($row[1], '/')) != 'CHEQUE PAGADO NO.') {
                AccountMovement::create([
                    'added_at' => $row[0],
                    'concept' => $row[1],
                    'type' => $row[2] == '' ? 'abono' : 'cargo',
                    'amount' => $row[2] + $row[3],
                    'bank_account_id' => $row[5],
                    'expenses_group_id' => $this->getGroupID(substr($row[1], 0, strpos($row[1], '/'))),
                    'provider_id' => $this->getGroupID(substr($row[1], 0, strpos($row[1], '/'))),
                ]);
            }

        }
    }

    function getGroupID($string)
    {
        $one = ["TRASPASO CUENTAS PROPIAS", "TRASPASO ENTRE CUENTAS"];

        $two = [
            "IVA COM. VENTAS DEBITO", "COMISION VENTAS DEBITO", "VENTAS DEBITO", "IVA COM. VENTAS CREDITO", "COMISION VENTAS CREDITO", 
            "VENTAS CREDITO", "IVA COM VTAS TDC INTER", "COM VTAS TDC INTER", "IVA COMISION SERVICIO", "COMISION SERVICIO NOMINA",
            "IVA COM CHEQUES LIBRADOS", "COM CHQ LIBRADOS PAGADOS"
        ];

        return in_array($string, $one) ? 1: (in_array($string, $two) ? 2: null);
    }

    function getProviderID($string)
    {
        $one = ["TRASPASO CUENTAS PROPIAS", "TRASPASO ENTRE CUENTAS"];

        $two = ["IVA COMISION SERVICIO", "COMISION SERVICIO NOMINA", "IVA COM CHEQUES LIBRADOS", "COM CHQ LIBRADOS PAGADOS"];

        $three = [
            "IVA COM. VENTAS DEBITO", "COMISION VENTAS DEBITO", "VENTAS DEBITO", "IVA COM. VENTAS CREDITO", "COMISION VENTAS CREDITO", 
            "VENTAS CREDITO", "IVA COM VTAS TDC INTER", "COM VTAS TDC INTER", 
        ];

        return in_array($string, $one) ? 1: (in_array($string, $two) ? 2: (in_array($string, $three) ? 3: null));
    }
}