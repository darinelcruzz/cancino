@extends('lte.root')
@push('pageTitle')
    Metas | Lista
@endpush

@section('content')
    @foreach ($dates as $month => $years)
        @if ($loop->iteration % 2 == 0)
            <div class="row">
        @endif
        <div class="col-md-6">
            <color-box title="{{ ucfirst(fdate($month, 'F', 'm')) }}" color="{{ auth()->user()->store->color }}" solid button {{ date('m') == $month ? '': 'collapsed' }}>
                <data-table example="{{ $loop->iteration }}">
                    {{ drawHeader('Año','Venta', 'Negro', 'Estrella', 'Dorada') }}
                    <template slot="body">
                        @foreach ($years as $date => $stores)
                            <tr>
                                <td>{{ $date }}</td>
                                <td>{{ fnumber($stores->sum('sale')) }} {!! $stores->first()->pointLabel !!}</td>
                                <td>{{ fnumber($stores->first()->blackPoint) }}</td>
                                <td>{{ fnumber($stores->first()->starPoint) }}</td>
                                <td>{{ fnumber($stores->first()->goldenPoint) }}</td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </solid-box>
        </div>
        @if ($loop->iteration % 2 == 0)
            </div>
        @endif
    @endforeach
@endsection
