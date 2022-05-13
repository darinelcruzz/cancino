<html>
<head>
    <meta charset="UTF-8">
    <title>Comisiones | {{ $goal->store->name . ' ' . fdate($goal->month . '/' . $goal->year , 'F y', 'n/Y') }}</title>
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

        .main td{
            border: 1px solid black;
        }

        .main th{
            border: 1px solid black;
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
                        <td align="right">{{ fnumber(($past_goal->sale + $past_goal->public) * $goal->star) }}</td>
                    </tr>
                    <tr>
                        <td align="center">INCREMENTO MENSUAL DE {{ ($goal->star-1)*100 }}%</td>
                        <td colspan="2" align="right">COMISIÓN DEL MES:</td>
                        <td align="right">{!! $commisions_complete->first()->managerPayment($commisions_complete->sum('sale') + $goal->sellers, $past_goal, $goal) !!}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <div class="row">
            <table width="100%" style="border-collapse: collapse; border-bottom: none; border-left: none; border-right: none;" class="spaced">
                <thead style="border-left: 3px solid black; border-right: 3px solid black; border-bottom: 1px solid black; border-top: 3px solid black;" class="main">
                    <tr>
                        <td rowspan="2">NOMBRE</td>
                        <td rowspan="2">MÍNIMO</td>
                        <td rowspan="2">META ACTUAL</td>
                        <td colspan="2">VENDIDO</td>
                        <td colspan="2">PUNTO</td>
                        <td colspan="2">COMISIONES</td>
                        <td rowspan="2">TOTAL</td>
                        <td rowspan="2">EXT <br> GAR</td>
                        <td rowspan="2">A PAGAR</td>
                        <td rowspan="2">R</td>
                        <td rowspan="2">F</td>
                        <td rowspan="2">TOTAL</td>
                    </tr>
                    <tr>
                        <td>$</td>
                        <td>AxT</td>
                        <td>$</td>
                        <td>AxT</td>
                        <td>$</td>
                        <td>AxT</td>
                    </tr>
                </thead>
                <tbody style="border-left: 3px solid black; border-right: 3px solid black; border-bottom: 1px solid black;" class="main">
                    @php
                        $sales_commisions_total = 0;
                        $total_pay_sum = 0;
                        $total_sum = 0;
                    @endphp
                    @foreach ($commisions_by_employee as $employee_id => $commisions)
                        @foreach ($commisions as $commision)
                            @php
                                $sales_commision_sum = $commisions->sum(function ($item) {
                                    return $item->sales_commision;
                                });
                                $total_employee_sum = $sales_commision_sum
                                    + $commision->scPoint($commisions->sum('sterencard'))[1]
                                    + $commision->extPoint($commisions->sum('extensions'), $commisions->sum('amount_ext'))[1]
                            @endphp
                            <tr>
                                @if ($loop->index == 0)
                                    <td rowspan="5">{{ $commision->employer->nickname }}</td>
                                @endif
                                <td>{{ fnumber($commision->weekly_goal) }}</td>
                                <td>{{ fnumber($commision->weekly_goal * $goal->star) }}</td>
                                <td>{{ fnumber($commision->sale) }}</td>
                                <td>{{ $commision->axt }}</td>
                                {{-- @if ($loop->index == 0)
                                    <td rowspan="5">{{ fnumber($commisions->sum('sale')) }}</td>
                                @endif --}}
                                <td>{!! $commision->salePointLabel !!}</td>
                                <td>{!! $commision->axtPoint($commision->axt)[0] !!}</td>
                                <td>{{ fnumber($commision->sales_commision) }}</td>
                                <td>{{ number_format($commision->axtCommission(), 2) }}</td>
                                @if($loop->index < 3)
                                @endif
                                @if ($loop->index == 0)
                                    <td rowspan="5">
                                        {{ fnumber($sales_commision_sum) }}
                                        <hr>
                                        {{ number_format($commisions->sum(function ($commission) { return $commission->axtCommission();}), 2) }}
                                    </td>
                                    <td rowspan="5">{!! $commision->scPoint($commisions->sum('sterencard'))[0] . fnumber($commision->scPoint($commisions->sum('sterencard'))[1]) !!} <br>
                                        {!! $commision->extPoint($commisions->sum('extensions'), $commisions->sum('amount_ext'))[0] . fnumber($commision->extPoint($commisions->sum('extensions'), $commisions->sum('amount_ext'))[1]) !!}</td>
                                    <td rowspan="5">{{ fnumber($total_employee_sum) }}</td>
                                    <td rowspan="5">{{ $commisions->sum('delays') }}<br> (-${{$commision->delaysSum($total_employee_sum)}})</td>
                                    <td rowspan="5">{{ $commisions->sum('absences') }}<br> (-${{$commision->absencesSum($total_employee_sum)}})</td>
                                    <td rowspan="5">{{ fnumber($total_employee_sum - $commision->absencesSum($total_employee_sum) - $commision->delaysSum($total_employee_sum) > 0 ? $total_employee_sum - $commision->absencesSum($total_employee_sum) - $commision->delaysSum($total_employee_sum) : 0) }}</td>
                                    @php
                                        $sales_commisions_total += $sales_commision_sum;
                                        $total_pay_sum += $total_employee_sum;
                                        $total_sum += max($total_employee_sum  - $commision->absencesSum($total_employee_sum) - $commision->delaysSum($total_employee_sum), 0);
                                    @endphp
                                @endif
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
                <tfoot>
                    <tr style="border-bottom: 3px solid black; border-left: 3px solid black; border-right: 3px solid black;" class="main">
                        <td><b>Total</b></td>
                        <td><b>{{ fnumber($commisions_complete->sum('weekly_goal')) }}</b></td>
                        <td><b>{{ fnumber($commisions_complete->sum('weekly_goal') * $goal->star) }}</b></td>
                        <td><b>{{ fnumber($commisions_complete->sum('sale')) }}</b></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><b>{{ fnumber($sales_commisions_total) }}</b></td>
                        <td><b>{{ number_format($commisions_by_employee->sum(function ($employee) { return $employee->sum(function ($commission) { return $commission->axtCommission();}); }), 2) }}</b></td>
                        <td></td>
                        <td></td>
                        {{-- <td><b>{{ $commisions_complete->sum('sterencard') }}</b></td> --}}
                        {{-- <td><b>{{ $commisions_complete->sum('extensions') }}</b></td> --}}
                        <td><b>{{ fnumber($total_pay_sum) }}</b></td>
                        <td><b>{{ $commisions_complete->sum('dalays') }}</b></td>
                        <td><b>{{ $commisions_complete->sum('absences') }}</b></td>
                        <td><b>{{ fnumber($total_sum) }}</b></td>
                    </tr>

                    <tr style="border: none;">
                        <td colspan="14">&nbsp;</td>
                    </tr>

                    <tr style="border: none;">
                        <td></td>
                        <td colspan="2" style="text-align: right">OTROS VENDEDORES</td>
                        <td style="border-bottom: 1px solid black;">{{ fnumber($goal->sellers) }}</td>
                        <td colspan="10"></td>
                    </tr>

                    <tr style="border: none;">
                        <td></td>
                        <th colspan="2" style="text-align: right"><small>TOTAL PÚBLICO</small></th>
                        <td>{{ fnumber($goal->sellers + $commisions_complete->sum('sale')) }}</td>
                        <td></td>
                        <th>Inv</th>
                        <td>{{ fnumber($goal->stock) }}</td>
                        <td colspan="7"></td>
                    </tr>

                    @php
                        $extras = 0
                    @endphp

                    @if($goal->store->type == 's')
                        <tr style="border: none;">
                            <td style="text-align: right">PÚBLICO</td>
                            <td>{{ fnumber($goal->public) }}</td>
                            <td colspan="12"></td>
                        </tr>
                        <tr style="border: none;">
                            <td style="text-align: right">OTROS</td>
                            <td>{{ fnumber($goal->other) }}</td>
                            <td colspan="12"></td>
                        </tr>
                        <tr style="border: none;">
                            <td style="text-align: right"><small>TOTAL</small></td>
                            <td>{{ fnumber($goal->public + $goal->other) }}</td>
                            <td></td>
                            <td style="border-bottom: 1px solid black;">{{ fnumber($goal->public + $goal->other) }}</td>
                            <td colspan="10"></td>
                        </tr>

                        @php
                            $extras = $goal->public + $goal->other
                        @endphp
                    @else
                        <tr style="border: none;">
                            <td style="text-align: right">ESPECIAL</td>
                            <td>{{ fnumber($goal->special) }}</td>
                            <td colspan="12"></td>
                        </tr>
                        <tr style="border: none;">
                            <td style="text-align: right">DISTRIBUIDOR</td>
                            <td>{{ fnumber($goal->distributor) }}</td>
                            <td colspan="12"></td>
                        </tr>
                        <tr style="border: none;">
                            <td style="text-align: right">MAYOREO</td>
                            <td>{{ fnumber($goal->wholesale) }}</td>
                            <td colspan="12"></td>
                        </tr>
                        <tr style="border: none;">
                            <td style="text-align: right">OTROS</td>
                            <td style="border-bottom: 1px solid black;">{{ fnumber($goal->other) }}</td>
                            <td colspan="12"></td>
                        </tr>
                        <tr style="border: none;">
                            <th style="text-align: right"><small>TOTAL</small></th>
                            <td>{{ fnumber($goal->special + $goal->distributor + $goal->other + $goal->wholesale) }}</td>
                            <td></td>
                            <td style="border-bottom: 1px solid black;">{{ fnumber($goal->special + $goal->distributor + $goal->other + $goal->wholesale) }}</td>
                            <td colspan="10"></td>
                        </tr>

                        @php
                            $extras = $goal->special + $goal->distributor + $goal->other + $goal->wholesale
                        @endphp
                    @endif

                    <tr style="border: none;">
                        <td colspan="14">&nbsp;</td>
                    </tr>

                    <tr style="border: none;">
                        <td></td><td></td>
                        <td style="text-align: right">DESCUENTOS</td>
                        <td>{{ fnumber($goal->discounts) }}</td>
                        <td colspan="10"></td>
                    </tr>
                    <tr style="border: none;">
                        <td></td><td></td>
                        <td style="text-align: right">STERENCARD</td>
                        <td>{{ fnumber($goal->steren_card) }}</td>
                        <td colspan="10"></td>
                    </tr>
                    <tr style="border: none;">
                        <td></td>
                        <th colspan="2" style="text-align: right"><small>VENTAS TOTALES</small></th>
                        <td style="border: 2px solid black;">{{ fnumber($goal->sellers + $commisions_complete->sum('sale') - $goal->discounts - $goal->steren_card + $extras) }}</td>
                        <td colspan="10"></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
</body>
</html>
