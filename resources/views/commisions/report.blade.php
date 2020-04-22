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

<body>
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
                        <td align="right">{!! $commisions_complete->first()->managerPayment($commisions_complete->sum('sale'), $past_goal, $goal) !!}</td>
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
                        <td>MÍNIMO</td>
                        <td>META ACTUAL</td>
                        <td>VENDIDO</td>
                        <td>TOTAL <br> VENDIDO</td>
                        <td>PUNTO</td>
                        <td>COMISIONES <br> POR VENTAS</td>
                        <td>TOTAL POR <br> VENTAS</td>
                        <td>STEREN <br> CARD</td>
                        <td>EXT <br> GAR</td>
                        <td>A PAGAR</td>
                        <td>R</td>
                        <td>F</td>
                        <td>TOTAL</td>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sales_commisions_total = 0;
                        $total_sum = 0;
                    @endphp
                    @foreach ($commisions_by_employee as $employee_id => $commisions)
                        @foreach ($commisions as $commision)
                            @php
                                $sales_commision_sum = $commisions->sum(function ($item) {
                                    return $item->sales_commision;
                                });
                                $total_employee_sum = $sales_commision_sum + $commision->scPoint($commisions->sum('sterencard'))[1] + $commision->extPoint($commisions->sum('extensions'), $commisions->sum('amount_ext'))[1]
                            @endphp
                            <tr>
                                @if ($loop->index == 0)
                                    <td rowspan="5">{{ $commision->employer->nickname }}</td>
                                @endif
                                <td>{{ fnumber($commision->weekly_goal) }}</td>
                                <td>{{ fnumber($commision->weekly_goal * $goal->star) }}</td>
                                <td>{{ fnumber($commision->sale) }}</td>
                                @if ($loop->index == 0)
                                    <td rowspan="5">{{ fnumber($commisions->sum('sale')) }}</td>
                                @endif
                                <td>{!! $commision->salePointLabel !!}</td>
                                <td>{{ fnumber($commision->sales_commision) }}</td>
                                @if ($loop->index == 0)
                                    <td rowspan="5">{{ fnumber($sales_commision_sum) }}</td>
                                    <td rowspan="5">{!! $commision->scPoint($commisions->sum('sterencard'))[0] . fnumber($commision->scPoint($commisions->sum('sterencard'))[1]) !!}</td>
                                    <td rowspan="5">{!! $commision->extPoint($commisions->sum('extensions'), $commisions->sum('amount_ext'))[0] . fnumber($commision->extPoint($commisions->sum('extensions'), $commisions->sum('amount_ext'))[1]) !!}</td>
                                    <td rowspan="5">{{ fnumber($total_employee_sum) }}</td>
                                    <td rowspan="5">{{ $commisions->sum('delays') }}</td>
                                    <td rowspan="5">{{ $commisions->sum('absences') }}</td>
                                    <td rowspan="5">{{ fnumber($total_employee_sum) }}</td>
                                    @php
                                        $sales_commisions_total += $sales_commision_sum;
                                        $total_sum += $total_employee_sum;
                                    @endphp
                                @endif
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td><b>Total</b></td>
                        <td><b>{{ fnumber($commisions_complete->sum('weekly_goal')) }}</b></td>
                        <td><b>{{ fnumber($commisions_complete->sum('weekly_goal') * $goal->star) }}</b></td>
                        <td><b>{{ fnumber($commisions_complete->sum('sale')) }}</b></td>
                        <td><b>{{ fnumber($commisions_complete->sum('sale')) }}</b></td>
                        <td><b></b></td>
                        <td><b>{{ fnumber($sales_commisions_total) }}</b></td>
                        <td><b>{{ fnumber($sales_commisions_total) }}</b></td>
                        <td><b>{{ $commisions_complete->sum('sterencard') }}</b></td>
                        <td><b>{{ $commisions_complete->sum('extensions') }}</b></td>
                        <td><b>{{ fnumber($total_sum) }}</b></td>
                        <td><b>{{ $commisions_complete->sum('dalays') }}</b></td>
                        <td><b>{{ $commisions_complete->sum('absences') }}</b></td>
                        <td><b>{{ fnumber($total_sum) }}</b></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
</body>
</html>
