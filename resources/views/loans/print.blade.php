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
                        <th>FECHA DE SALIDA</th>
                        <td class="bbottom">{{ date('d/m/Y') }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>

                    <tr>
                        <th>CANTIDAD</th>
                        <th>MODELO</th>
                        <td colspan="3"></td>
                    </tr>

                    @foreach($loans as $loan)

                    <tr>
                        <td>{{ $loan->quantity }}</td>
                        <td>{{ $loan->item }}</td>
                        <td colspan="3"></td>
                    </tr>

                    @endforeach

                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>

                    <tr>
                        <th>DE (TIENDA)</th>
                        <td colspan="2" class="bbottom">{{ $loan->fromr->name }}</td>
                        <td></td><td></td>
                    </tr>

                    <tr>
                        <th>A (TIENDA)</th>
                        <td colspan="2" class="bbottom">{{ $loan->tor->name }}</td>
                        <td></td><td></td>
                    </tr>

                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>

                    <tr>
                        <td style="width: 40%" colspan="2" class="bbottom">{{ $loan->authorized_by }}</td>
                        <td style="width: 20%"></td>
                        <td style="width: 40%" colspan="2" class="bbottom">{{ $loan->received_by }}</td>
                    </tr>
                    <tr>
                        <th style="width: 40%" colspan="2">AUTORIZA</th>
                        <td style="width: 20%"></td>
                        <th style="width: 40%" colspan="2">RECIBE</th>
                    </tr>

                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <hr class="dashed-line">

    </section>
</body>
</html>
