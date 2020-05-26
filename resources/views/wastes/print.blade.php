<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>-$200 | Reporte</title>
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
    </style>
</head>

<body onload="window.print()">
    <section class="invoice">
        <div class="row">
            <table width="100%">
                <thead>
                    <tr>
                        <td colspan="3" rowspan="2">
                            <img src="{{ asset('images/steren-3.png') }}" alt="steren-logo" height="60px">
                        </td>
                        <td colspan="3">
                            <h3>
                                {{ strtoupper($store->name) }} <br>
                                <small>(PRODUCTOS MENORES A $ 200.00)</small>
                            </h3>
                        </td>
                        <td colspan="3" rowspan="2">
                            <img src="{{ asset('images/vks-3.png') }}" alt="vks-logo" height="60px">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">{{ date('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <td colspan="9">&nbsp;</td>
                    </tr>
                    <tr>
                        <th class="box">MODELO</th>
                        <th class="box">CANT</th>
                        <th style="width: 5%"></th>
                        <th class="box">MODELO</th>
                        <th class="box">CANT</th>
                        <th style="width: 5%"></th>
                        <th class="box">MODELO</th>
                        <th class="box">CANT</th>
                        <th></th>
                    </tr>
                </thead>
                
                <tbody>

                    @foreach($chunks as $chunk)

                        <tr>
                            @foreach($chunk as $item => $wastes)
                                <td style="width: 23%" class="box">{{ $item }}</td>
                                <td style="width: 7%" class="box">{{ $wastes->count() }}</td>
                                @if($loop->iteration < 3)
                                    <td style="width: 5%">&nbsp;</td>
                                @else
                                    <td></td>
                                @endif
                            @endforeach
                        </tr>
                    
                    @endforeach

                    <tr>
                        <td colspan="9">&nbsp;</td>
                    </tr>

                </tbody>
            </table>
        </div>

    </section>
</body>
</html>
