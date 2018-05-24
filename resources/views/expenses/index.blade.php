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
                    {{ drawHeader('ID', 'Cheque','Fecha', 'Monto', 'Concepto', 'Descripcion') }}

                    <template slot="body">
                        @foreach($expenses as $expense)
                            <tr>
                                <td>{{ $expense->id }}</td>
                                <td>{{ $expense->check }}</td>
                                <td>{{ fdate($expense->date, 'd M Y', 'Y-m-d') }}</td>
                                <td>{{ fnumber($expense->amount) }}</td>
                                <td>{{ $expense->concept }}</td>
                                <td>{{ $expense->description }}</td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </solid-box>
        </div>
    </div>
@endsection
