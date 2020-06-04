<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Transferencias y cheques</title>
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

        table {
          border-collapse: collapse;
        }
    </style>
</head>

<body onload="window.print()">
    <section class="invoice">
        <div class="row">
            <div class="col-md-12">
                <table width="100%">
                    <thead>
                        <tr>
                            <td rowspan="2">
                                <img src="{{ asset('images/steren-3.png') }}" alt="steren-logo" height="60px">
                            </td>
                            <td colspan="2">
                                <h3>
                                    {{ strtoupper($store->name) }} <br>
                                    <small>TRANSFERENCIAS Y CHEQUES</small>
                                </h3>
                            </td>
                            <td rowspan="2">
                                <img src="{{ asset('images/vks-3.png') }}" alt="vks-logo" height="60px">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">{{ fdate($from, 'd/M/Y', 'Y-m-d') . ' - ' . fdate($to, 'd/M/Y', 'Y-m-d') }}</td>
                        </tr>
                        <tr>
                            <td colspan="4">&nbsp;</td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="row">
            <table width="100%">
                <thead>
                    <tr>
                        <th class="box">CORTE</th>
                        <th class="box">TIPO</th>
                        <th class="box">CLIENTE</th>
                        <th class="box">MONTO</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($checkups as $checkup)
                        @foreach($checkup->transfer as $transfer)
                        <tr>
                            <td class="box" style="width: 12%">{{ fdate($checkup->date_sale, 'd/M/y', 'Y-m-d') }}</td>
                            <td class="box" style="width: 15%">{{ ucfirst($transfer['t']) }}</td>
                            <td class="box" style="width: 60%">{{ $transfer['c'] }}</td>
                            <td class="box" style="width: 13%">$ {{ number_format($transfer['a'], 2) }}</td>
                        </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>

    </section>
</body>
</html>
