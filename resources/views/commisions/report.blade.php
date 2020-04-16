<html>
<head>
    <meta charset="UTF-8">
    <title>Grupo Cancino|Comisiones</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('/img/logo.ico') }}" />
    <link href="{{ asset('/css/all.css') }}" rel="stylesheet" type="text/css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">

    <style>
        td, th {
            font-size: 9pt;
            font-family: 'Roboto', sans-serif;
        }

        .spaced td{
            text-align: center;
            font-size: 7pt;
        }
    </style>
</head>

<body onload="window.print()">
    <section class="invoice">
        <div class="row">
            <table width="100%">
                <tbody>
                    <tr>
                        <td width="33%" rowspan="3"><img SRC="{{ asset('/img/Steren.png') }}"></td>
                        <th width="33%" align="center"><b>VENTA DE {{ strtoupper(fdate($goal->month . '/' . $goal->year , 'F Y', 'n/Y')) }}</b></th>
                        <td width="12%"></td>
                        <td width="12%" align="right">AÑO ANTERIOR:</td>
                        <td width="10%" align="right">{{ fnumber($past_goal->sale) }}</td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td align="right">META DEL MES:</td>
                        <td align="right">{{ fnumber($past_goal->sale * $goal->star) }}</td>
                    </tr>
                    <tr>
                        <td align="center">INCREMENTO MENSUAL DE {{ ($goal->star-1)*100 }}%</td>
                        <td colspan="2" align="right">COMISIÓN DEL MES:</td>
                        <td align="right">{{ fnumber($goal->id) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <div class="row">
            <table width="100%" style="border-collapse: collapse;" border="3" class="spaced">
                <thead>
                    <tr>
                        <td>NOMBRE</td>
                        <td>META AÑO <br> PASADO</td>
                        <td>META ACTUAL</td>
                        <td>VENDIDO</td>
                        <td>TOTAL <br> VENDIDO</td>
                        <td>PUNTO</td>
                        <td>COMISIONES <br> POR VENTAS</td>
                        <td>TOTAL POR <br> VENTAS</td>
                        <td>STEREN <br> CARD</td>
                        <td>EXT <br> GAR</td>
                        <td>EXT S/IVA</td>
                        <td>A PAGAR</td>
                        <td>R</td>
                        <td>F</td>
                        <td>TOTAL</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employers as $employer)
                        <tr>
                            <td rowspan="6">{{ $employer->first()->employer->nickname }}</td>
                            @foreach ($employer as $e_goal)
                                <tr>
                                    <td>{{ fnumber($e_goal->goal) }}</td>
                                    <td>{{ fnumber($e_goal->goal * $goal->star) }}</td>
                                    <td>{{ fnumber($e_goal->sale) }}</td>
                                </tr>
                            @endforeach
                            <td rowspan="6">holi</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>
