@extends('lte.root')
@push('pageTitle')
    Compras | Lista
@endpush

@push('headerTitle')
    <a href="{{ route('shoppings.create') }}" class="btn btn-success btn-xs"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;AGREGAR</a>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Compras" color="primary">
                <data-table example="1">
                    {{ drawHeader('ID', 'Folio','Fecha', 'Monto', 'Tipo', 'Referencia') }}

                    <template slot="body">
                        @foreach($shoppings as $shopping)
                            <tr>
                                <td>{{ $shopping->id }}</td>
                                <td>{{ $shopping->folio }}</td>
                                <td>{{ fdate($shopping->date, 'd M Y', 'Y-m-d') }}</td>
                                <td>{{ fnumber($shopping->amount) }}</td>
                                <td>{{ $shopping->type }}</td>
                                <td>{{ $shopping->reference }}</td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </solid-box>
        </div>
    </div>
@endsection
