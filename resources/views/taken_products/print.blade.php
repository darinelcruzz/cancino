<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos en uso</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('/img/logo.ico') }}" />
    <link href="{{ asset('/css/all.css') }}" rel="stylesheet" type="text/css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">

    <style>
        table, th, td {
            font-size: 9pt;
            font-family: 'Roboto', sans-serif;
            text-align: center;
        }
        .box {
            border: 1px solid black;
            border-collapse: collapse;
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
                                <small>(PRODUCTOS EN USO)</small>
                            </h3>
                        </td>
                        <td colspan="3" rowspan="2">
                            <img src="{{ asset('images/vks-3.png') }}" alt="vks-logo" height="60px">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">Al {{ date('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <td colspan="9">&nbsp;</td>
                    </tr>
                </thead>
            </table>
            <table width="100%" class="box">
                <thead>
                    <tr>
                        <th width="15%" class="box">FECHA</th>
                        <th width="25%" class="box">MODELO</th>
                        <th width="10%" class="box">CANT</th>
                        <th width="25%" class="box">MOTIVO</th>
                        <th width="15%" class="box">USUARIO</th>
                        <th width="10%" class="box"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td class="box">{{ fdate($product->taken_at, 'd-M-Y', 'Y-m-d') }}</td>
                            <td class="box">{{ $product->code }}</td>
                            <td class="box">{{ $product->quantity }}</td>
                            <td class="box">{{ $product->observations }}</td>
                            <td class="box">{{ $product->user->name }}</td>
                            <td class="box"></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </section>
</body>
</html>
