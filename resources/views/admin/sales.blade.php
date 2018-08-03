@extends('lte.root')
@push('pageTitle')
    Ventas | Lista
@endpush

@push('headerTitle')
    @if (auth()->user()->level == 5)
        <a href="{{ route('sales.create') }}" class="btn btn-success btn-xs"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Agregar</a>
    @endif
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Ventas" color="primary">
                <data-table example="N">
                    {{ drawHeader('Fecha','Chiapas', 'Soconusco', 'Altos', 'Plaza', 'Total') }}
                    <template slot="body">
                        @foreach ($dates as $date => $stores)
                            <tr>
                                <td>{{ fdate($date, 'D, d/m/Y', 'Y-m-d') }}</td>
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
