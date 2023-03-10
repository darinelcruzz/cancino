@extends('lte.root')

@push('pageTitle', 'Productos')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box color="primary" title="Productos">
                <div class="row">

                    <div class="col-md-6">
                        <a href="{{ route('product.export', 'no-descontinuado') }}" class="btn btn-xs btn-github">
                            EN LINEA  &nbsp;&nbsp;<i class="fa fa-file-download"></i>
                        </a>
                        <a href="{{ route('product.export', 'cable') }}" class="btn btn-xs btn-primary">
                            CABLE &nbsp;&nbsp;<i class="fa fa-file-download"></i>
                        </a>
                        <a href="{{ route('product.export', 'sin-cable') }}" class="btn btn-xs btn-primary">
                            SIN-CABLE &nbsp;&nbsp;<i class="fa fa-file-download"></i>
                        </a>

                        <a href="{{ route('product.export', 'descontinuado') }}" class="btn btn-xs btn-default">
                            DESCONTINUADO &nbsp;&nbsp;<i class="fa fa-file-download"></i>
                        </a>

                        <a href="{{ route('product.export', 'excel') }}" class="btn btn-xs btn-success">
                            TODOS &nbsp;&nbsp;<i class="fa fa-file-download"></i>
                        </a>

                        <a href="{{ route('product.export', 'csv') }}" class="btn btn-xs btn-warning">
                            CSV &nbsp;&nbsp;<i class="fa fa-file-download"></i>
                        </a>
                    </div>

                </div>

                <br>

                @php
                    $sum = 0;
                    $online = 0;
                    $all = 0;
                @endphp
                <data-table example="1">
                    {{ drawHeader('modelo', 'descripción', 'código', 'antes', 'después', 'diferencia', 'costo', 'valor') }}
                    <template slot="body">
                        @foreach($products as $product)
                            <tr>
                                <td>
                                    {{ $product->code }}
                                    @if($product->status == 'Descontinuado')
                                        <br><small><code>DESCONTINUADO</code></small>
                                    @endif
                                </td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->barcode }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->counts->sum('quantity') }}</td>
                                <td>{{ $product->counts->sum('quantity') - $product->quantity }}</td>
                                <td>
                                    {{ number_format($product->price, 2) }}
                                </td>
                                <td>
                                    {{ number_format(($product->counts->sum('quantity') - $product->quantity) * $product->price, 2) }}
                                </td>
                            </tr>
                            @php
                                $sum += ($product->counts->sum('quantity') - $product->quantity) * $product->price;
                                $all += $product->quantity * $product->price;
                                $online += $product->status != 'Descontinuado' ? ($product->counts->sum('quantity') - $product->quantity) * $product->price: 0;
                            @endphp
                        @endforeach
                    </template>

                    <template slot="footer">
                        <tr>
                            <th colspan="7" style="text-align: right">COSTO TOTAL DIFERENCIAS EN LÍNEA</th>
                            <td>{{ number_format($online, 2) }}</td>
                        </tr>
                        <tr>
                            <th colspan="7" style="text-align: right">COSTO TOTAL DIFERENCIAS</th>
                            <td>{{ number_format($sum, 2) }}</td>
                        </tr>
                        <tr>
                            <th colspan="7" style="text-align: right">VALOR INICIAL INVENTARIO</th>
                            <td>{{ number_format($all, 2) }}</td>
                        </tr>
                    </template>
                </data-table>
            </color-box>
        </div>
    </div>
@endsection
