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
            <color-box title="{{ ucfirst(fdate("2019-$month-1", 'F', 'Y-n-j')) }}" color="{{ auth()->user()->store->color }}" solid button {{ date('m') == $month ? '': 'collapsed' }}>
                <table class="table table-striped table-bordered no-pagination">
                    <thead>
                        <tr>
                            <th>Año</th>
                            <th>Ventas</th>
                            <th>Negro</th>
                            <th>Estrella</th>
                            <th>Dorada</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($years as $date => $stores)
                            <tr>
                                <td>{{ $date }}</td>
                                <td>{{ fnumber($stores->sum('sale')) }} {!! $stores->first()->pointLabel !!}</td>
                                <td>{{ fnumber($stores->first()->blackPoint) }}</td>
                                <td>{{ fnumber($stores->first()->starPoint) }}</td>
                                <td>{{ fnumber($stores->first()->goldenPoint) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </color-box>
        </div>
        @if ($loop->iteration % 2 == 0)
            </div>
        @endif
    @endforeach
@endsection
