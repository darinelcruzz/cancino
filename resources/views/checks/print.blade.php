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
            <table width="100%">
                <thead>
                    <tr>
                        <td rowspan="2">
                            <img src="{{ asset('images/steren-3.png') }}" alt="steren-logo" height="60px">
                        </td>
                        <td colspan="2">
                            <h3>
                                CHEQUE {{ $check->folio }} <br>
                                <small>por {{ fnumber($check->amount) }}</small>
                            </h3>
                        </td>
                        <td rowspan="2">
                            <img src="{{ asset('images/vks-3.png') }}" alt="vks-logo" height="60px">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>
                </thead>
            </table>
        </div>
        <br>
        <div class="row">
            <table width="100%">
                <thead>
                    <tr>
                        <th class="box">FACTURA</th>
                        <th class="box">MONTO</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $total = 0;
                    @endphp

                    @foreach($files as $file)
                        @php
                            $fileArray = explode("___", substr($file, strlen($route) + 1));
                            $total += $fileArray[1] ?? 0;
                        @endphp
                        <tr>
                            <td class="box">{{ $fileArray[0] }}</td>
                            <td class="box" style="text-align: right;">{{ number_format($fileArray[1] ?? 0, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <th class="box">TOTAL</th>
                        <th class="box" style="text-align: right;">{{ number_format($total, 2) }}</th>
                    </tr>
                    <tr>
                        <th class="box">DIFERENCIA</th>
                        <th class="box" style="text-align: right;">{{ number_format($total - $check->amount, 2) }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>

    </section>
</body>
</html>
