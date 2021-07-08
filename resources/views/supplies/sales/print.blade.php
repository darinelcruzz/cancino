<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Venta de insumos</title>
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

        .bbottom {
            border-bottom: 2px solid black;
        }

        .dashed-line { 
            width: 100%;
            margin: auto;
            margin-top: 5%;
            margin-bottom: 5%;
            border: 3px dashed black;
        }

        .signature {
            width: 40%;
            border: 0px;
            border-bottom: 1px solid black;
            height: 30px;
        }
    </style>
</head>

<body onload="window.print()">
    <section class="invoice">
        <table width="100%">
            <thead>
                <tr>
                    <td colspan="3" rowspan="2">
                        <img src="{{ asset('images/steren-3.png') }}" alt="steren-logo" height="60px">
                    </td>
                    <td colspan="3">
                        <h3>
                            Venta de insumos #{{ $supply_sale->id }}<br>
                            {{ $supply_sale->store->name }}<br>
                        </h3>
                    </td>
                    <td colspan="3" rowspan="2">
                        <img src="{{ asset('images/vks-3.png') }}" alt="vks-logo" height="60px">
                    </td>
                </tr>
                <tr>
                    <td colspan="3">{{ date('d/m/Y', strtotime($supply_sale->sold_at)) }}</td>
                </tr>
                <tr>
                    <td colspan="9">&nbsp;</td>
                </tr>                    
                <tr>
                    <th class="box" colspan="1">CANTIDAD</th>
                    <th class="box" colspan="3">MODELO</th>
                    <th class="box" colspan="2">PRECIO</th>
                    <th class="box" colspan="3">IMPORTE</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach($supply_sale->movements as $movement)
                    <tr>
                        <td class="box">{{ $movement->quantity }}</td>
                        <td class="box" colspan="3">{{ $movement->supply->description }}</td>
                        <td class="box" colspan="2">{{ $movement->price }}</td>
                        <td class="box" colspan="3">{{ number_format($movement->price * $movement->quantity, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <td colspan="4"></td>
                    <th class="box" colspan="2">TOTAL</th>
                    <th class="box" colspan="3">{{ number_format($supply_sale->movements->sum(function ($item) { return $item->price * $item->quantity; }), 2) }}</th>
                </tr>
            </tfoot>
        </table>

        <br><br><br>

        <table width="100%">
            <tbody>
                <tr>
                    <td style="padding:0px;">
                        <input type="text" class="signature"><input type="text" class="signature"><br>
                        <em>&nbsp;ENTREGA (NOMBRE Y FIRMA)</em>
                    </td>
                    <td style="padding:0px;">
                        <input type="text" class="signature"><input type="text" class="signature"><br>
                        <em>&nbsp;RECIBE (NOMBRE Y FIRMA)</em>
                    </td>
                </tr>
            </tbody>
        </table>

    </section>
</body>
</html>
