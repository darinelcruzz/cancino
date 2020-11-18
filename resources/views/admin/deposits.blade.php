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
                foreach ($storesCollection as $id => $name) {
                    ${strtolower($name)} = 0;
                }
                $total = 0;
            @endphp
            <div class="col-md-12">
                <color-box title="{{ ucfirst(fdate("$month-1", 'F \(Y\)', 'Y-m-j')) }}" color="primary" solid button {{ $loop->index == 0 ? '': 'collapsed' }}>

                    <data-table example="{{ $loop->iteration }}">

                        <template slot="header">
                            <tr>
                                <th>Fecha</th>
                                @foreach($storesCollection as $name)
                                <th>{{ ucfirst($name) }}</th>
                                @endforeach
                            </tr>
                        </template>

                        <template slot="body">
                            @foreach ($days as $date => $stores)
                                <tr>
                                    <td>{{ fdate($date, 'd, l', 'Y-m-d') }}</td>

                                    @foreach($storesCollection as $id => $name)
                                        <td>
                                            {{ fdate($stores->where('store_id', $id)->pluck('date_deposit')->pop(), 'd/M/y', 'Y-m-d') }}<br>
                                            {{ fnumber($stores->where('store_id', $id)->sum('cash')) }}
                                            <span style="color:{{ colorDay($date, $stores->where('store_id', $id)->sum('cash'),$stores->where('store_id', $id)->pluck('date_deposit')->pop()) }}">
                                                <i class="fa fa-circle"></i>
                                            </span><br>
                                            {{ $stores->where('store_id', $id)->pluck('observations')->pop() }}
                                            @if ($stores->where('store_id', $id)->pluck('status')->pop() == 'pendiente')
                                                <modal-button target="{{ $stores->where('store_id', $id)->pluck('id')->pop() }}"><i class="fa fa-check"></i></modal-button>
                                                @include('templates/checkModal', ['store_id' => $id])
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
