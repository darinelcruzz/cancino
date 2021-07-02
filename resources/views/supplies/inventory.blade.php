<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inventario</title>
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
                                <img src="{{ asset('images/vks-3.png') }}" alt="vks-logo" height="60px">
                            </td>
                            <td colspan="2">
                                <h3>
                                    VKS Administración de negocios S.C.<br>
                                    Inventario de insumos
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
        </div>
        <div class="row">
            <table width="100%">
                <thead>
                    <tr>
                        <th style="text-align: left;" class="box">INSUMO</th>
                        <th class="box">UNIDAD</th>
                        <th class="box">TUXTLA GTZ</th>
                        <th class="box">TAPACHULA</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($supplies as $supply)
                        @if($supply->totalStock != 0)
                        <tr style="text-transform:uppercase">
                            <td style="text-align: left;" class="box">{{ $supply->description }}</td>
                            <td class="box">{{ $supply->unit }}</td>
                            @foreach($supply->stocks as $stock)
                            <td class="box">{{ $stock->quantity }}</td>
                            @endforeach
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>

    </section>
</body>
</html>
