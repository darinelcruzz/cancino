
<html>
<head>
    <meta charset="UTF-8">
    <title>Póliza</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('/img/logo.ico') }}" />
    <link href="{{ asset('/css/all.css') }}" rel="stylesheet" type="text/css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">

    <style>
        th, td {
            font-size: 9pt;
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
        <div class="row">
            <table width="100%" style="border-radius: 20px; border: 5px solid black">
                <thead>
                    <tr>
                        <td width="10%"></td>
                        <td width="10%"></td>
                        <td width="10%"></td>
                        <td width="10%"></td>
                        <td width="10%"></td>
                        <td width="10%"></td>
                        <td width="10%"></td>
                        <td width="10%"></td>
                        <td width="10%"></td>
                        <td width="10%"></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td colspan="3"><span style="font-size: 12pt"><b>POLIZA DE CHEQUE</b></span></td>
                        <td colspan="4"></td>
                        <td valign="TOP" colspan="2"><b>Copia del Cheque</b></td>
                    </tr>
                    <tr><td></td></tr>
                    <tr>
                        <td colspan="7"></td>
                        <td colspan="2"><b>{{ fdate($check->emitted_at, 'd/M/y', 'Y-m-d') }}</b></td>
                    </tr>
                    <tr><td></td></tr>
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="5"><b>{{ $check->name }}</b></td>
                        <td colspan="2"><b>{{ fnumber($check->amount)}}</b></td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr>
                        <td align="center" colspan="10"><b>({{ $check->amountAsText }}/100 MXN)</b></td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td>&nbsp;</td></tr>
                </tbody>
            </table>
        </div>
        <br>
        <div class="row">
            <table width="100%" style="border-collapse: collapse;" border="1" class="spaced">
                <thead>
                    <tr>
                        <td width="25%">Entrada Almacen número</td>
                        <td width="25%">Banco</td>
                        <td width="25%">Número de Cuenta</td>
                        <td width="25%">Número de Cheque</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td valign="TOP";><br>&nbsp;</td>
                        <td valign="TOP";>BANCOMER</td>
                        <td valign="TOP";>Nº {{ $check->account_movement->bank_account->number }}</td>
                        <td valign="TOP";>{{ $check->folio }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <table width="100%">
            <tr>
                <td width="60%">
                    <table width="100%" style="border-radius: 20px; border: 1px solid black">
                        <thead>
                            <tr>
                                <td width="10%"></td>
                                <td width="90%"></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td><span style="font-size: 14pt;">Concepto del pago</span></td>
                            </tr>
                            <tr><td>&nbsp;</td></tr>
                            <tr>
                                <td></td>
                                <td>{{ $check->concept }}</td>
                            </tr>
                            <tr><td>&nbsp;</td></tr>
                            <tr><td>&nbsp;</td></tr>
                        </tbody>
                    </table>
                </td>
                <td width="40%">
                    <table width="100%" style="border-radius: 20px; border: 1px solid black">
                        <thead>
                            <tr>
                                <td width="15%"></td>
                                <td width="85%"></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td style="font-size: 12pt;">Firma Cheque Recibido</td>
                            </tr>
                            <tr><td></td></tr>
                            <tr>
                                <td align=right>Nombre:</td>
                                <td>_______________________________</td>
                            </tr>
                            <tr><td>&nbsp;</td></tr>
                            <tr>
                                <td align="right">Firma:</td>
                                <td>_______________________________</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td align="center">Sello en caso de tenerlo</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>
        <br>
        <table width="100%" style="border-collapse: collapse;" border="1" class="spaced">
            <thead>
                <tr>
                    <td width="11%">Cuenta</td>
                    <td width="11%">Sub Cuenta</td>
                    <td width="39%">Nombre de la Cuenta</td>
                    <td width="13%" colspan="2">Parcial</td>
                    <td width="13%" colspan="2">Debe</td>
                    <td width="13%" colspan="2">Haber</td>
                </tr>
            </thead>
            <tbody>
                @for ($i=0; $i < 11; $i++)
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td width="9%">&nbsp;</td>
                        <td width="4%">&nbsp;</td>
                        <td width="9%">&nbsp;</td>
                        <td width="4%">&nbsp;</td>
                        <td width="9%">&nbsp;</td>
                        <td width="4%">&nbsp;</td>
                    </tr>
                    <tr>
                        <td bgcolor="#dddddd">&nbsp;</td>
                        <td bgcolor="#dddddd">&nbsp;</td>
                        <td bgcolor="#dddddd">&nbsp;</td>
                        <td width="9%" bgcolor="#dddddd">&nbsp;</td>
                        <td width="4%" bgcolor="#dddddd">&nbsp;</td>
                        <td width="9%" bgcolor="#dddddd">&nbsp;</td>
                        <td width="4%" bgcolor="#dddddd">&nbsp;</td>
                        <td width="9%" bgcolor="#dddddd">&nbsp;</td>
                        <td width="4%" bgcolor="#dddddd">&nbsp;</td>
                    </tr>
                @endfor
            </tbody>
        </table>

        <table width="100%">
            <thead>
                <tr>
                    <td width="74%">
                        <table width="100%">
                            <thead>
                                <tr>
                                    <td width="20%">DISTRIBUCIÓN:</td>
                                    <td width="40%">Original "Contabilidad"</td>
                                    <td width="40%"  align=right>SUMAS IGUALES</td>
                                </tr>
                                <tr>
                                    <td width="20%"></td>
                                    <td width="40%">Copia "Control Interno"</td>
                                    <td width="40%"></td>
                                </tr>
                            </thead>
                        </table>
                    </td>
                    <td width="26%">
                        <table width="100%" style="border-collapse: collapse;" border="1" class="spaced">
                            <thead>
                                <tr>
                                    <td width="9%">&nbsp;</td>
                                    <td width="4%">&nbsp;</td>
                                    <td width="9%">&nbsp;</td>
                                    <td width="4%">&nbsp;</td>
                                </tr>
                            </thead>
                        </table>
                        <br>
                    </td>
                </tr>
            </thead>
        </table>

        <table width="100%" style="border-collapse: collapse;" border="1" class="spaced">
            <thead>
                <tr>
                    <td width="18%">Hecho por:</td>
                    <td width="18%">Revisado:</td>
                    <td width="18%">Autorizado:</td>
                    <td width="18%">Auxiliares</td>
                    <td width="18%">Diario</td>
                    <td width="10%">Poliza No.</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td valign="TOP";>{{ auth()->user()->name }}</td>
                    <td valign="TOP";><br>&nbsp;</td>
                    {{-- <td valign="TOP";>{{ $check->type == 3 ? "Victor Cancino" : $check->store->managerr->name }}</td> --}}
                    <td valign="TOP";>{{ $check->store->managerr->name }}</td>
                    <td valign="TOP";></td>
                    <td valign="TOP";></td>
                    <td valign="TOP";></td>
                </tr>
            </tbody>
        </table>

    </section>
</body>
