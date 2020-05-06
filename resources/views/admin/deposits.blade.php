@extends('lte.root')
@push('pageTitle')
    Ventas | Lista
@endpush

@push('headerTitle')
    <div class="row">
        <div class="col-md-3">
            @include('templates/month_select', ['route' => 'admin.deposits', 'date' => $date])
        </div>
    </div>
@endpush

@section('content')
    @foreach ($months as $month => $days)
        <div class="row">
            @php
                $chiapas = $soconusco = $altos = $galeTux = $galeTapa = $total = 0;
            @endphp
            <div class="col-md-12">
                <color-box title="{{ ucfirst(fdate("$month-1", 'F \(Y\)', 'Y-m-j')) }}" color="primary" solid button {{ $loop->index == 0 ? '': 'collapsed' }}>

                    <data-table example="{{ $loop->iteration }}">

                        {{ drawHeader('Fecha', 'Chiapas', 'Soconusco', 'Altos', 'Gale Tux', 'Gale Tapa') }}

                        <template slot="body">
                            @foreach ($days as $date => $stores)
                                <tr>
                                    <td>{{ fdate($date, 'd, l', 'Y-m-d') }}</td>

                                    @foreach([2, 3, 4, 5, 6] as $store_id)
                                        <td>
                                            {{ fdate($stores->where('store_id', $store_id)->pluck('date_deposit')->pop(), 'd/M/y', 'Y-m-d') }}<br>
                                            {{ fnumber($stores->where('store_id', $store_id)->sum('cash')) }}
                                            <span style="color:{{ colorDay($date, $stores->where('store_id', $store_id)->sum('cash'),$stores->where('store_id', $store_id)->pluck('date_deposit')->pop()) }}">
                                                <i class="fa fa-circle"></i>
                                            </span><br>
                                            {{ $stores->where('store_id', $store_id)->pluck('observations')->pop() }}
                                            @if ($stores->where('store_id', $store_id)->pluck('status')->pop() == 'pendiente')
                                                <modal-button target="{{ $stores->where('store_id', $store_id)->pluck('id')->pop() }}"><i class="fa fa-check"></i></modal-button>
                                                @include('templates/checkModal')
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </template>
                    </data-table>
                </solid-box>
            </div>
        </div>
    @endforeach
@endsection
