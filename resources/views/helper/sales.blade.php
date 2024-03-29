@extends('lte.root')
@push('pageTitle')
    Ventas | Lista
@endpush

@push('headerTitle')
    @if (auth()->user()->isHelper)
        <a href="{{ route('sales.create') }}" class="btn btn-success btn-xs"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Agregar</a>
    @endif
@endpush

@section('content')
    @foreach ($dates as $month => $days)
        <div class="row">
            <div class="col-md-12">
                <color-box title="{{ ucfirst(fdate("$month-1", 'F \(Y\)', 'Y-m-j')) }}" color="primary" solid button {{ $loop->index == 0 ? '': 'collapsed' }}>
                    <data-table example="{{ $loop->iteration }}">
                        {{ drawHeader('Fecha','Chiapas', 'Soconusco', 'Altos', 'Gale Tux', 'Gale Tapa') }}
                        <template slot="body">
                            @foreach ($days as $date => $stores)
                                <tr>
                                    <td>{{ fdate($date, 'd, l', 'Y-m-d') }}</td>
                                    <td>{{ fnumber($stores->where('store_id', 2)->sum('total')) }}</td>
                                    <td>{{ fnumber($stores->where('store_id', 3)->sum('total')) }}</td>
                                    <td>{{ fnumber($stores->where('store_id', 4)->sum('total')) }}</td>
                                    <td>{{ fnumber($stores->where('store_id', 5)->sum('total')) }}</td>
                                    <td>{{ fnumber($stores->where('store_id', 6)->sum('total')) }}</td>
                                </tr>
                            @endforeach
                        </template>
                    </data-table>
                </solid-box>
            </div>
        </div>
    @endforeach
@endsection
