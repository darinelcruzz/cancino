@extends('lte.root')

@push('pageTitle', 'Conteos parciales')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box color="vks" title="Conteos parciales" solid>
                <data-table example="1">
                    {{ drawHeader('código', 'piso', 'bodega', 'otros', 'esperado', 'diferencia', 'pérdida') }}
                    <template slot="body">
                        @foreach($products as $product => $counts)
                            @php
                                $item = $counts->first()->product;
                            @endphp
                            <tr>
                                <td>{{ $product }}</td>
                                <td>{{ $counts->where('location_id', 1)->sum('quantity') }}</td>
                                <td>{{ $counts->where('location_id', 2)->sum('quantity') }}</td>
                                <td>{{ $counts->where('location_id', 3)->sum('quantity') }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->counts->sum('quantity') - $item->quantity }}</td>
                                <td style="text-align: right">
                                    {{ number_format(($item->counts->sum('quantity') - $item->quantity) * $item->price, 2) }}
                                </td>
                            </tr>
                            @php
                                $sum += ($item->counts->sum('quantity') - $item->quantity) * $item->price;
                                $online += $item->status != 'Descontinuado' ? ($item->counts->sum('quantity') - $item->quantity) * $item->price: 0;
                            @endphp
                        @endforeach
                    </template>

                    <template slot="footer">
                        <tr>
                            <th colspan="6" style="text-align: right">COSTO TOTAL DIFERENCIAS EN LÍNEA</th>
                            <td style="text-align: right">{{ number_format($online, 2) }}</td>
                        </tr>
                        <tr>
                            <th colspan="6" style="text-align: right">COSTO TOTAL DIFERENCIAS</th>
                            <td style="text-align: right">{{ number_format($sum, 2) }}</td>
                        </tr>
                    </template>
                </data-table>
            </color-box>
        </div>
    </div>
@endsection
