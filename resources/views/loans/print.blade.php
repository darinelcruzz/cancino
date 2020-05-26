<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Traspaso de mercancía</title>
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

        /*th, td {
          border: 1px solid black;
        }*/

        th, td {
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
    </style>
</head>

<body onload="window.print()">
    <section class="invoice">
        <div class="row">
            <table width="100%" style="border: 5px solid black">
                <thead>
                    <tr>
                        <td colspan="5" style="text-align: center"><h2>TRASPASO DE MERCANCÍA</h2></td>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td colspan="2" rowspan="2">
                            <img src="{{ asset('images/steren-3.png') }}" alt="steren-logo" height="60px">
                        </td>
                        <td></td>
                        <th>FECHA</th>
                        <td class="bbottom">{{ date('d/m/Y') }}</td>
                    </tr>

                    <tr>
                        <td colspan="5" style="text-align: right"><small><em><b>ORIGINAL</b></em></small></td>
                    </tr>

                    <tr>
                        <th style="width: 5%"></th>
                        <th style="width: 5%"></th>
                        <td>
                            <table width="100%">
                                <thead>
                                    <th>CANTIDAD</th>
                                    <th>MODELO</th>
                                </thead>
                                <tbody>
                                    @foreach($loans as $loan)

                                    <tr>
                                        <td>{{ $loan->quantity }}</td>
                                        <td>{{ $loan->item }}</td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                        <td style="width: 5%"></td>
                        <td style="width: 5%"></td>
                    </tr>

                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>

                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>

                    <tr>
                        <td style="width: 40%" colspan="2" class="bbottom">{{ $loan->authorized_by or '' }}</td>
                        <td style="width: 20%"></td>
                        <td style="width: 40%" colspan="2" class="bbottom">{{ $loan->received_by or '' }}</td>
                    </tr>
                    <tr>
                        <th style="width: 40%" colspan="2">AUTORIZA ({{ $loan->fromr->name or '' }})</th>
                        <td style="width: 20%"></td>
                        <th style="width: 40%" colspan="2">RECIBE ({{ $loan->tor->name or '' }})</th>
                    </tr>

                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <hr class="dashed-line">

        <div class="row">
            <table width="100%" style="border: 5px solid black">
                <thead>
                    <tr>
                        <td colspan="5" style="text-align: center"><h2>TRASPASO DE MERCANCÍA</h2></td>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td colspan="2" rowspan="2">
                            <img src="{{ asset('images/steren-3.png') }}" alt="steren-logo" height="60px">
                        </td>
                        <td></td>
                        <th>FECHA</th>
                        <td class="bbottom">{{ date('d/m/Y') }}</td>
                    </tr>

                    <tr>
                        <td colspan="5" style="text-align: right"><small><em><b>COPIA</b></em></small></td>
                    </tr>

                    <tr>
                        <th style="width: 5%"></th>
                        <th style="width: 5%"></th>
                        <td>
                            <table width="100%">
                                <thead>
                                    <th>CANTIDAD</th>
                                    <th>MODELO</th>
                                </thead>
                                <tbody>
                                    @foreach($loans as $loan)

                                    <tr>
                                        <td>{{ $loan->quantity }}</td>
                                        <td>{{ $loan->item }}</td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                        <td style="width: 5%"></td>
                        <td style="width: 5%"></td>
                    </tr>

                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>

                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>

                    <tr>
                        <td style="width: 40%" colspan="2" class="bbottom">{{ $loan->authorized_by or '' }}</td>
                        <td style="width: 20%"></td>
                        <td style="width: 40%" colspan="2" class="bbottom">{{ $loan->received_by or '' }}</td>
                    </tr>
                    <tr>
                        <th style="width: 40%" colspan="2">AUTORIZA ({{ $loan->fromr->name or '' }})</th>
                        <td style="width: 20%"></td>
                        <th style="width: 40%" colspan="2">RECIBE ({{ $loan->tor->name or '' }})</th>
                    </tr>

                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </section>
</body>
</html>
