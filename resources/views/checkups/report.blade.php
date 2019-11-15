<html>
<head>
    <meta charset="UTF-8">
    <title>Grupo Cancino|Póliza</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('/img/logo.ico') }}" />
    <link href="{{ asset('/css/all.css') }}" rel="stylesheet" type="text/css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">

    <style>
        th, td {
            font-size: 8pt;
            font-family: 'Roboto', sans-serif;
        }

        html, body { overflow: hidden;}

        .spaced td{
            text-align: center;
        }


    </style>
</head>

<body onload="window.print()">
    <section class="invoice">
        <table width="100%">
            <tbody>
                <tr>
                    <td colspan="3" align="center"><span style="font-size: 14pt;"><b>CORPORACION DE ESPECIALISTAS EN ACTUALIZACION FISCAL, S.C.</b></span></td>
                </tr>
                <tr>
                    <td width="6%"></td>
                    <td width="10%"><span style="font-size: 10pt;">Compañía:</span></td>
                    <td width="84%"><span style="font-size: 10pt;">{{ $checkup->store->social }}</span></td>
                </tr>
                <tr>
                    <td width="6%"></td>
                    <td width="10%"><span style="font-size: 10pt;">RFC:</span></td>
                    <td width="84%"><span style="font-size: 10pt;">{{ $checkup->store->rfc }}</span></td>
                </tr>
            </tbody>
        </table>

        <table width="100%" style="border: 5px solid black">
            <thead>
                <tr>
                    <td colspan="4" align="center"><span style="font-size: 11pt;"><b>CONTROL DE CORTE: EFECTIVO, CHEQUES, TARJETA DE DEBITO Y CREDITO</b></span></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td valign="TOP" width="23%" rowspan="2">
                        <table width="100%" style="border-collapse: collapse;" border="1" class="spaced">
                            <tbody>
                                <tr>
                                    <td colspan="3"><b>EFECTIVO</b></td>
                                </tr>
                                @foreach ($checkup->cash as $item)
                                    <tr>
                                        <td width="30%">{{ fnumber($item['v']) }}</td>
                                        <td width="30%">{{ $item['q'] }}</td>
                                        <td width="40%">{{ fnumber($item['v'] * $item['q']) }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="2"><b>Total</b></td>
                                    <td><b>{{ fnumber($checkup->cash_sums['s']) }}</b></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>Total Corte</b></td>
                                    <td><b>{{ fnumber($checkup->cash_sums['c']) }}</b></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>Diferencia</b></td>
                                    <td><b>{{ fnumber($checkup->cash_sums['d']) }}</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td valign="TOP" width="40%">
                        <table width="100%" style="border-collapse: collapse;" border="1" class="spaced">
                            <tbody>
                                <tr>
                                    <td colspan="3"><b>CHEQUES Y TRANSFERENCIAS</b></td>
                                </tr>
                                @if ($checkup->transfer)
                                    @foreach ($checkup->transfer as $item)
                                        <tr>
                                            <td width="18%">{{ $item['t'] }}</td>
                                            <td width="59%">{{ $item['c'] }}</td>
                                            <td width="23%">{{ fnumber($item['a']) }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                <tr>
                                    <td colspan="2"><b>Total</b></td>
                                    <td><b>{{ fnumber($checkup->transfer_sums['s']) }}</b></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>Total Corte</b></td>
                                    <td><b>{{ fnumber($checkup->transfer_sums['c']) }}</b></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>Diferencia</b></td>
                                    <td><b>{{ fnumber($checkup->transfer_sums['d']) }}</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td valign="TOP" width="18%" height='10%'>
                        <table width="100%" style="border-collapse: collapse;" border="1" class="spaced">
                            <tbody>
                                <tr>
                                    <td colspan="2"><b>TERMINAL BBVA</b></td>
                                </tr>
                                @if ($checkup->bbva)
                                    @foreach ($checkup->bbva as $item)
                                        <tr>
                                            <td width="45%">{{ $item['f'] }}</td>
                                            <td width="55%">{{ fnumber($item['a']) }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </td>
                    <td valign="TOP" width="18%" height='10%'>
                        <table width="100%" style="border-collapse: collapse;" border="1" class="spaced">
                            <tbody>
                                <tr>
                                    <td colspan="2"><b>TERMINAL BANAMEX</b></td>
                                </tr>
                                @if ($checkup->banamex)
                                    @foreach ($checkup->banamex as $item)
                                        <tr>
                                            <td width="45%">{{ $item['f'] }}</td>
                                            <td width="55%">{{ fnumber($item['a']) }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="80%" style="border-collapse: collapse;" align="center" border="3" class="spaced">
                            <tbody>
                                <tr>
                                    <td width="40%"><spam style="font-size: 10pt;"><b>Total<br>Corte</b></spam></td>
                                    <td width="60%"><spam style="font-size: 12pt;"><b><b>{{ fnumber($checkup->amount) }}</b></spam></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td valign="TOP" colspan="2">
                        <table width="100%" style="border-collapse: collapse;" border="1" class="spaced">
                            <tbody>
                                <tr>
                                    <td><b>Total</b></td>
                                    <td><b>{{ fnumber($checkup->card_sums['s']) }}</b></td>
                                </tr>
                                <tr>
                                    <td><b>Total Corte</b></td>
                                    <td><b>{{ fnumber($checkup->card_sums['c']) }}</b></td>
                                </tr>
                                <tr>
                                    <td><b>Diferencia</b></td>
                                    <td><b>{{ fnumber($checkup->card_sums['d']) }}</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <table width="100%">
            <tbody>
                <tr>
                    <td align="center" bgcolor="#dddddd"><span style="font-size: 14pt;">CONTROL DE NOTAS DE CREDITO</span></td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                <tr>
                    <td align="center" bgcolor="#dddddd"><span style="font-size: 10pt;">NOTAS DE CREDITO POR STEREN CARD: (1)</td>
                </tr>
            </tbody>
        </table>
        <br>
        <table width="100%" style="border-collapse: collapse;" border="1" class="spaced">
            <tbody>
                <tr>
                    <td width="8%">FOLIO</td>
                    <td width="27%">CLIENTE</td>
                    <td width="13%">SUBTOTAL</td>
                    <td width="13%">IVA</td>
                    <td width="13%">TOTAL</td>
                    <td>OBSERVACIONES</td>
                </tr>
                <tr>
                    <td>{{ $checkup->notes['f'] }}</td>
                    <td>CLIENTE MOSTRADOR</td>
                    <td>{{ subtotal($checkup->notes['a']) }}</td>
                    <td>{{ iva($checkup->notes['a']) }}</td>
                    <td>{{ fnumber($checkup->notes['a']) }}</td>
                    <td>BONIF STEREN CARD</td>
                </tr>
            </tbody>
        </table>
        <br>
        <table width="100%">
            <tbody>
                <tr>
                    <td align="center" bgcolor="#dddddd"><span style="font-size: 10pt;">NOTAS DE CREDITO POR DEVOLUCION Y/O CANCELACION: (2)</td>
                </tr>
            </tbody>
        </table>
        <br>
        <table width="100%" style="border-collapse: collapse;" border="1" class="spaced">
            <tbody>
                <tr>
                    <td width="8%">FOLIO</td>
                    <td width="27%">CLIENTE</td>
                    <td width="13%">SUBTOTAL</td>
                    <td width="13%">IVA</td>
                    <td width="13%">TOTAL</td>
                    <td>OBSERVACIONES</td>
                </tr>
                @php
                    $sum = 0;
                    $options = ['1' => 'DEVOLUCION DE EFECTIVO', '2' => 'CAMBIO DE PRODUCTO', '3' => 'REFACTURACION'];
                @endphp
                @if ($checkup->returns)
                    @foreach ($checkup->returns as $item)
                        <tr>
                            <td>{{ $item['f'] }}</td>
                            <td>{{ $item['c'] }}</td>
                            <td>{{ subtotal($item['a']) }}</td>
                            <td>{{ iva($item['a']) }}</td>
                            <td>{{ fnumber($item['a']) }}</td>
                            <td>{{ $options[$item["o"]] }}</td>
                        </tr>
                        @php
                        $sum = $sum + $item['a'];
                        @endphp
                    @endforeach
                @endif
                <tr>
                    <td colspan="2">SUMAS:--------------------</td>
                    <td>{{ subtotal($sum) }}</td>
                    <td>{{ iva($sum) }}</td>
                    <td>{{ fnumber($sum) }}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <table width="74%" style="border-collapse: collapse;" border="1" class="spaced">
            <tbody>
                <tr>
                    <th colspan="2">SUMA NOTAS CRÉDITO MOTIVO (1 Y 2):-----</th>
                    <th width="17.6%">{{ subtotal($sum + $checkup->notes['a']) }}</th>
                    <th width="17.6%">{{ iva($sum + $checkup->notes['a']) }}</th>
                    <th width="17.6%">{{ fnumber($sum + $checkup->notes['a']) }}</th>
                </tr>
            </tbody>
        </table>
        <br><br>
        <table width="100%">
            <tbody>
                <tr>
                    <td colspan="10%" align="center"></td>
                    <td align="center">ELABORÓ:<br>{{ $checkup->sale->user->name }}</td>
                    <td colspan="10%" align="center"></td>
                    <td align="center">REVISÓ:<br>{{ $manager->name }}</td>
                    <td colspan="10%" align="center"></td>
                </tr>
            </tbody>
        </table>
    </section>
</body>
