@extends('lte.root')
@push('pageTitle')
    Ventas | Lista
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Depositos pendientes" color="danger">
                <data-table example="1">
                    {{ drawHeader('ID','Fecha', 'Efectivo', 'Total', 'Deposito', 'Tiempo') }}

                    <template slot="body">
                        @foreach($pendings as $sale)
                            <tr>
                                <td>{{ $sale->id }}</td>
                                <td>{{ fdate($sale->date_sale, 'D, d M Y', 'Y-m-d') }}</td>
                                <td>{{ fnumber($sale->cash) }}</td>
                                <td>{{ fnumber($sale->total) }}</td>
                                <td>{{ fdate($sale->date_deposit, 'D, d M Y', 'Y-m-d') }}</td>
                                <td>
                                    <span style="color:{{ $sale->dif_day }}">
                                        <i class="fa fa-circle"></i>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </solid-box>
        </div>
        <div class="col-md-12">
            <color-box title="Depositados" color="success">
                <data-table example="2">
                    {{ drawHeader('ID','Fecha', 'Efectivo', 'Total', 'Deposito', 'Observaciones', 'Tiempo') }}

                    <template slot="body">
                        @foreach($currents as $sale)
                            <tr>
                                <td>{{ $sale->id }}</td>
                                <td>{{ fdate($sale->date_sale, 'D, d M Y', 'Y-m-d') }}</td>
                                <td>{{ fnumber($sale->cash) }}</td>
                                <td>{{ fnumber($sale->total) }}</td>
                                <td>{{ fdate($sale->date_deposit, 'D, d M Y', 'Y-m-d') }}</td>
                                <td>{{ $sale->observations }}</td>
                                <td>
                                    <span style="color:{{ $sale->dif_day }}">
                                        <i class="fa fa-circle"></i>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </solid-box>
        </div>
    </div>
@endsection
