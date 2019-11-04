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

{{-- <body onload="window.print()"> --}}
<body>
    <section class="invoice">
        <table width="100%">
            <tbody>
                <tr>
                    <td colspan="3" align="center"><span style="font-size: 14pt;"><b>CORPORACION DE ESPECIALISTAS EN ACTUALIZACION FISCAL, S.C.</b></span></td>
                </tr>
                <tr>
                    <td width="6%"></td>
                    <td width="10%"><span style="font-size: 10pt;">Compañía:</span></td>
                    <td width="84%"><span style="font-size: 10pt;">{{ $store->social }}</span></td>
                </tr>
                <tr>
                    <td width="6%"></td>
                    <td width="10%"><span style="font-size: 10pt;">Almacén:</span></td>
                    <td width="84%"><span style="font-size: 10pt;">{{ $store->rfc }}</span></td>
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
                    <td valign="TOP" width="40%" rowspan="2">
                        <table width="100%" style="border-collapse: collapse;" border="1" class="spaced">
                            <tbody>
                                <tr>
                                    <td colspan="3"><b>CHEQUES Y TRANSFERENCIAS</b></td>
                                </tr>
                                @foreach ($checkup->transfer as $item)
                                    <tr>
                                        <td width="18%">{{ $item['t'] }}</td>
                                        <td width="59%">{{ $item['c'] }}</td>
                                        <td width="23%">{{ fnumber($item['a']) }}</td>
                                    </tr>
                                @endforeach
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
                    <td valign="TOP" width="18%" style="height:auto;">
                        <table width="100%" style="border-collapse: collapse;" border="1" class="spaced">
                            <tbody>
                                <tr>
                                    <td colspan="2"><b>TERMINAL BBVA</b></td>
                                </tr>
                                @foreach ($checkup->bbva as $item)
                                    <tr>
                                        <td width="45%">{{ $item['f'] }}</td>
                                        <td width="55%">{{ fnumber($item['a']) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                    <td valign="TOP" width="18%" height='10%'>
                        <table width="100%" style="border-collapse: collapse;" border="1" class="spaced">
                            <tbody>
                                <tr>
                                    <td colspan="2"><b>TERMINAL BANAMEX</b></td>
                                </tr>
                                @foreach ($checkup->banamex as $item)
                                    <tr>
                                        <td width="45%">{{ $item['f'] }}</td>
                                        <td width="55%">{{ fnumber($item['a']) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td valign="TOP" colspan="2">
                        <table width="100%" style="border-collapse: collapse;" border="1" class="spaced">
                            <tbody>
                                <tr>
                                    <td colspan="2"><b>Total</b></td>
                                    <td><b>{{ fnumber($checkup->card_sums['s']) }}</b></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>Total Corte</b></td>
                                    <td><b>{{ fnumber($checkup->card_sums['c']) }}</b></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>Diferencia</b></td>
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
                    <td>23456</td>
                    <td>CLIENTE MOSTRADOR</td>
                    <td>$2,000.00</td>
                    <td>$2,000.00</td>
                    <td>$2,000.00</td>
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
                <tr>
                    <td>23456</td>
                    <td>CLIENTE MOSTRADOR</td>
                    <td>$2,000.00</td>
                    <td>$2,000.00</td>
                    <td>$2,000.00</td>
                    <td>BONIF STEREN CARD</td>
                </tr>
                <tr>
                    <td colspan="2">SUMAS:--------------------</td>
                    <td>$2,000.00</td>
                    <td>$2,000.00</td>
                    <td>$2,000.00</td>
                </tr>
            </tbody>
        </table>
    </section>
</body>
