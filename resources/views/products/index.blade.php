@extends('lte.root')

@push('pageTitle', 'Productos')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box color="primary" title="Productos">
                <a href="{{ route('product.export') }}" class="btn btn-xs btn-success">
                    DESCARGAR &nbsp;&nbsp;<i class="fa fa-file-download"></i>
                </a>

                <hr>
                
                @php
                    $sum = 0
                @endphp
                <data-table example="1">
                    {{ drawHeader('código', 'descripción', 'antes', 'después', 'diferencia', 'costo') }}
                    <template slot="body">
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->code }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->counts->sum('quantity') }}</td>
                                <td>{{ $product->counts->sum('quantity') - $product->quantity }}</td>
                                <td>
                                    {{ number_format(($product->counts->sum('quantity') - $product->quantity) * $product->price, 2) }}
                                </td>
                            </tr>
                            @php
                                $sum = ($product->counts->sum('quantity') - $product->quantity) * $product->price
                            @endphp
                        @endforeach
                    </template>

                    <template slot="footer">
                        <tr>
                            <th colspan="5" style="text-align: right">COSTO TOTAL DIFERENCIAS</th>
                            <td>{{ number_format($sum, 2) }}</td>
                        </tr>
                    </template>
                </data-table>
            </color-box>
        </div>
    </div>
@endsection
