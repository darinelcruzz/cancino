@extends('lte.root')
@push('pageTitle')
    Metas | Lista
@endpush

@section('content')
    @foreach ($dates as $month => $years)
        <div class="col-md-6">
            <color-box title="{{ ucfirst(fdate($month, 'F', 'm')) }}" color="{{ auth()->user()->store->color }}" solid button {{ date('m') == $month ? '': 'collapsed' }}>
                <data-table example="{{ $loop->iteration }}">
                    {{ drawHeader('Año','Venta') }}
                    <template slot="body">
                        @foreach ($years as $date => $stores)
                            <tr>
                                <td>{{ $date }}</td>
                                <td>{{ fnumber($stores->sum('sale')) }} {!! $stores->first()->pointLabel !!}</td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </solid-box>
        </div>
    @endforeach
@endsection
