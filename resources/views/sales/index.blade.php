@extends('lte.root')
@push('pageTitle')
    Ventas | Lista
@endpush

@push('headerTitle')
    <a href="{{ route('sales.create') }}" class="btn btn-success btn-xs"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Agregar</a>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Ventas" color="success">
                <data-table example="1">
                    {{ drawHeader('ID','Fecha', 'Efectivo', 'Total', 'Deposito', 'Tiempo') }}

                    <template slot="body">
                        @foreach($sales as $sale)
                            <tr>
                                <td>{{ $sale->id }}</td>
                                <td>{{ fdate($sale->date_sale, 'd M Y', 'Y-m-d') }}</td>
                                <td>{{ fnumber($sale->cash) }}</td>
                                <td>{{ fnumber($sale->total) }}</td>
                                <td>
                                    @if ($sale->status == 'pendiente')
                                        @include('sales/date')
                                    @else
                                        {{ fdate($sale->date_deposit, 'd M Y', 'Y-m-d') }}
                                    @endif
                                </td>
                                <td>
                                    <span class="label label-{{ fdif($sale->date_sale, $sale->date_deposit) }}">
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
