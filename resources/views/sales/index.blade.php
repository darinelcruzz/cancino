@extends('lte.root')
@push('pageTitle')
    Compras | Lista
@endpush

@push('headerTitle')
    <a href="{{ route('sales.create') }}" class="btn btn-success btn-xs"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;AGREGAR</a>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Compras" color="primary">
                <data-table example="1">
                    {{ drawHeader('ID', 'Folio','Fecha', 'Monto', 'Tipo', 'Referencia') }}

                    <template slot="body">
                        @foreach($sales as $sale)
                            <tr>
                                <td>{{ $sale->id }}</td>
                                <td>{{ fdate($sale->date, 'd M Y', 'Y-m-d') }}</td>
                                <td>{{ fnumber($sale->cash) }}</td>
                                <td>{{ fnumber($sale->amount) }}</td>
                                <td>{{ $sale->stauts }}</td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </solid-box>
        </div>
    </div>
@endsection
