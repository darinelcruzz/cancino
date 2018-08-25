@extends('lte.root')
@push('pageTitle')
    Metas | Lista
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="2017" color="success">
                <data-table example="1">
                    {{ drawHeader('', 'Mes', 'Tienda', 'Venta 2017', 'Punto 2017') }}

                    <template slot="body">
                        @foreach($goals17 as $goal)
                            <tr>
                                <td>{{ $goal->month }}</td>
                                <td>{{ fdate($goal->month, 'M', 'm') }}</td>
                                <td>{{ $goal->store->name }}</td>
                                <td>{{ fnumber($goal->past_sale) }}</td>
                                <td>{{ $goal->past_point }}</td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </solid-box>
        </div>
    </div>
@endsection
