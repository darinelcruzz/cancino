@extends('lte.root')
@push('pageTitle')
    Ventas | Lista
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Ventas por día para negro {{ fnumber($perDay) }}" color="success">
                <data-table example="1">
                    {{ drawHeader('ID','Fecha', 'Público', '<i class="fa fa-circle"></i>', '<i class="fa fa-star"></i>') }}

                    <template slot="body">
                        @php
                            $public = 0;
                            $dif = 0;
                        @endphp
                        @foreach($sales as $sale)
                            @if (fdate($sale->date_sale, 'm-Y', 'Y-m-d') == $month)
                                <tr>
                                    <td>{{ $sale->id }}</td>
                                    <td>{{ fdate($sale->date_sale, 'D, d M Y', 'Y-m-d') }}</td>
                                    <td>{{ fnumber($sale->public) }}</td>
                                    <td>{{ fnumber($sale->difSale[0]) }}</td>
                                    <td>{{ fnumber($sale->difSale[1]) }}</td>
                                </tr>
                                @php
                                    $public = $public + $sale->public;
                                    $difPoint = $dif + $sale->difSale[0];
                                    $difStar = $dif + $sale->difSale[1];
                                @endphp
                            @endif
                        @endforeach
                    </template>
                    <template slot="footer">
                        <tr>
                            <td></td>
                            <td></td>
                            <td><b>{{ fnumber($public) }}</b></td>
                            <td><b>{{ fnumber($difPoint) }}</b></td>
                            <td><b>{{ fnumber($difStar) }}</b></td>
                        </tr>
                    </template>
                </data-table>
            </solid-box>
        </div>
    </div>
@endsection
