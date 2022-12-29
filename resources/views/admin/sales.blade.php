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
                @php
                
                foreach($header as $id => $name) {
                    $storeSums[strtolower(str_replace(' ', '', str_replace(['á', 'ó'], ['a', 'o'], $name)))] = 0;
                }
                
                $storeSums['total'] = 0;

                @endphp
            <div class="col-md-12">
                <color-box title="{{ ucfirst(fdate("$month-1", 'F \(Y\)', 'Y-m-j')) }}" color="primary" solid button {{ $loop->index == 0 ? '': 'collapsed' }}>
                    <data-table example="{{ $loop->iteration }}">
                        <template slot="header">
                            <tr>
                                <th><small>FECHA</small></th>
                                @foreach($header as $head)
                                <th style="text-align: right;">{{ $head }}</th>
                                @endforeach
                                <th><small>TOTAL</small></th>
                            </tr>
                        </template>

                        <template slot="body">
                            @foreach ($days as $date => $stores)
                                <tr>
                                    <td>{{ fdate($date, 'd, l', 'Y-m-d') }}</td>
                                    @foreach($header as $id => $name)

                                    <td style="text-align: right;">{{ fnumber($stores->where('store_id', $id)->sum('total')) }}</td>

                                    @php
                                    $storeSums[strtolower(str_replace(' ', '', str_replace(['á', 'ó'], ['a', 'o'], $name)))] += $stores->where('store_id', $id)->sum('total')
                                    @endphp

                                    @endforeach
                                    <td style="text-align: right;">{{ fnumber($stores->sum('total')) }}</td>
                                </tr>
                                @php
                                    $storeSums['total'] += $stores->sum('total');
                                @endphp
                            @endforeach
                        </template>
                        <template slot="footer">
                            <tr>
                                <td><b>Total</b></td>
                                @foreach($storeSums as $sum)
                                <td style="text-align: right;"><b>{{ fnumber($sum) }}</b></td>
                                @endforeach
                            </tr>
                        </template>
                    </data-table>
                </solid-box>
            </div>
        </div>
    @endforeach
@endsection
