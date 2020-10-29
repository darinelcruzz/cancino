<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Transferencias y cheques</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('/img/logo.ico') }}" />
    <link href="{{ asset('/css/all.css') }}" rel="stylesheet" type="text/css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">

    <style>
        .box {
          border: 1px solid black;
        }

        table, th, td {
            font-size: 9pt;
            font-family: 'Roboto', sans-serif;
            text-align: center;
        }

        table {
          border-collapse: collapse;
        }
    </style>
</head>

<body onload="window.print()">
    <section class="invoice">
        <div class="row">
            <div class="col-md-12">
                <table width="100%">
                    <thead>
                        <tr>
                            <td rowspan="2">
                                <img src="{{ asset('images/vks-3.png') }}" alt="vks-logo" height="60px">
                            </td>
                            <td colspan="2">
                                <h3>
                                    VKS Administración de negocios S.C.<br>
                                    Inventario de insumos
                                </h3>
                            </td>
                            <td rowspan="2">
                                <img src="{{ asset('images/vks-3.png') }}" alt="vks-logo" height="60px">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <h3>Al {{ fdate($date, 'd/M/Y', 'Y-m-d') }}</h3>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">&nbsp;</td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="row">
            <table width="100%">
                <thead>
                    <tr>
                        <th class="box">INSUMO</th>
                        <th class="box">CÓDIGO</th>
                        <th class="box">UNIDAD</th>
                        <th class="box">CANTIDAD</th>
                        <th class="box">PRECIO</th>
                        <th class="box">TOTAL</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($supplies as $supply_id => $movements)
                        @php
                            $supply = App\Supply::find($supply_id);
                            $quantity = $movements->sum(function ($movement) {
                                if ($movement->movable_type == 'App\SupplySale') {
                                    return $movement->quantity * (-1);
                                } else {
                                    return $movement->quantity;
                                }
                            });

                            $sum += $supply->sale_price/1.16 * $quantity
                        @endphp

                        <tr style="text-transform:uppercase">
                            <td class="box">{{ $supply->description }}</td>
                            <td class="box">{{ $supply->code }}</td>
                            <td class="box">{{ $supply->unit }}</td>
                            <td class="box">{{ $quantity }}</td>
                            <td class="box">{{ number_format($supply->sale_price/1.16, 2) }}</td>
                            <td class="box">{{ number_format($supply->sale_price/1.16 * $quantity, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <td colspan="4"></td>
                        <th>TOTAL SIN IVA</th>
                        <td class="box">{{ number_format($sum, 2) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>

    </section>
</body>
</html>
