@extends('lte.root')
@push('pageTitle')
    Ventas | Lista
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Ventas" color="primary">
                <data-table example="1">
                    {{ drawHeader('Fecha','Chiapas', 'Soconusco', 'Altos', 'Plaza', 'Total') }}
                    <template slot="body">
                        @foreach ($dates as $date => $stores)
                            <tr>
                                <td>{{ fdate($date, 'd M Y', 'Y-m-d') }}</td>
                                <td>{{ fnumber($stores->where('store_id', 2)->sum('total')) }}</td>
                                <td>{{ fnumber($stores->where('store_id', 3)->sum('total')) }}</td>
                                <td>{{ fnumber($stores->where('store_id', 4)->sum('total')) }}</td>
                                <td>{{ fnumber($stores->where('store_id', 5)->sum('total')) }}</td>
                                <td>{{ fnumber($stores->sum('total')) }}</td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </solid-box>
        </div>
    </div>
@endsection
