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
    @foreach ($dates as $month => $days)
        <div class="row">
            @php
                $chiapas = 0;
                $soconusco = 0;
                $altos = 0;
                $plaza = 0;
                $total = 0;
            @endphp
            <div class="col-md-12">
                <color-box title="{{ ucfirst(fdate($month, 'F \(Y\)', 'Y-m')) }}" color="primary" solid button {{ $loop->index == 0 ? '': 'collapsed' }}>
                    <data-table example="{{ $loop->iteration }}">
                        {{ drawHeader('Fecha','Chiapas', 'Soconusco', 'Altos', 'Plaza', 'Total') }}
                        <template slot="body">
                            @foreach ($days as $date => $stores)
                                <tr>
                                    <td>{{ fdate($date, 'd, l', 'Y-m-d') }}</td>
                                    <td>{{ fnumber($stores->where('store_id', 2)->sum('total')) }}</td>
                                    <td>{{ fnumber($stores->where('store_id', 3)->sum('total')) }}</td>
                                    <td>{{ fnumber($stores->where('store_id', 4)->sum('total')) }}</td>
                                    <td>{{ fnumber($stores->where('store_id', 5)->sum('total')) }}</td>
                                    <td>{{ fnumber($stores->sum('total')) }}</td>
                                </tr>
                                @php
                                    $chiapas = $chiapas + $stores->where('store_id', 2)->sum('total');
                                    $soconusco = $soconusco + $stores->where('store_id', 3)->sum('total');
                                    $altos = $altos + $stores->where('store_id', 4)->sum('total');
                                    $plaza = $plaza + $stores->where('store_id', 5)->sum('total');
                                    $total = $total + $stores->sum('total');
                                @endphp
                            @endforeach
                        </template>
                        <template slot="footer">
                            <tr>
                                <td><b>Total</b></td>
                                <td><b>{{ fnumber($chiapas) }}</b></td>
                                <td><b>{{ fnumber($soconusco) }}</b></td>
                                <td><b>{{ fnumber($altos) }}</b></td>
                                <td><b>{{ fnumber($plaza) }}</b></td>
                                <td><b>{{ fnumber($total) }}</b></td>
                            </tr>
                        </template>
                    </data-table>
                </solid-box>
            </div>
        </div>
    @endforeach
@endsection
