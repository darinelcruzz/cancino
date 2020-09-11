@extends('lte.root')
@push('pageTitle')
    Comisiones | Lista
@endpush

{{-- @push('headerTitle')
    <a href="{{ route('commision.create') }}" class="btn btn-success btn-xs"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Agregar</a>
@endpush --}}

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('templates/month_select', ['route' => 'commision.index', 'date' => $date])
        </div>
    </div><br>
    @foreach ($stores as $store)
        @php
            $relation = $store->first()->first()->goal->store;
            $total_sc = 0;
            $total_ext = 0;
            $total_amount_ext = 0;
        @endphp
        <div class="row">
            <div class="col-md-12">
                <color-box title="Comisiones de {{ $relation->name }}" color="{{ $relation->color }}">
                    <data-table example="{{ $relation->id }}">
                        {{ drawHeader('Nombre', '<i class="fa fa-info"></i>','Semana 1', 'Semana 2', 'Semana 3', 'Semana 4', 'Semana 5', 'SC', 'Extensiones') }}

                        <template slot="body">
                            @foreach($store as $employer)
                                <tr>
                                    <td style="width: 12%;">{{ $employer->first()->employer->nickname }}</td>
                                    <td>
                                        <i class="fa fa-flag"></i><br>
                                        <i class="fa fa-usd"></i>
                                    </td>
                                    @foreach ($employer as $goal)
                                        <td>
                                            <span style="color: {{ $goal->weekly_goal > 0 ? 'black': 'gray' }};">{{ fnumber($goal->weekly_goal) }}</span><br>
                                            <span style="color: {{ $goal->sale > 0 ? 'black': 'gray' }};"><strong>{{ fnumber($goal->sale) }}</strong></span>
                                            &nbsp;&nbsp;&nbsp;{!! $goal->salePointLabel !!}
                                        </td>
                                    @endforeach
                                    <td style="text-align: center;">
                                        {{ $employer->sum('sterencard') }}
                                    </td>
                                    <td style="text-align: center;">
                                        {{ $employer->sum('extensions') }} | {{ fnumber($employer->sum('amount_ext')) }}
                                    </td>
                                </tr>
                                @php
                                $total_sc += $employer->sum('sterencard');
                                $total_ext += $employer->sum('extensions');
                                $total_amount_ext += $employer->sum('amount_ext');
                                @endphp
                            @endforeach
                        </template>
                        @php
                        if (isset($employer)) {
                            $goal_id = $employer->last()->goal_id;
                        }else {
                            $goal_id = 0;
                        }
                        @endphp
                        <template slot="footer">
                            <tr>
                                <td>
                                    @if(auth()->user()->level == 1)
                                    <div class="btn-group">
                                        <a href="{{ route('commision.report', $goal_id) }}" class="btn btn-success btn-xs" target="_blank">
                                            <i class="fa fa-print"></i>&nbsp;&nbsp;REP
                                        </a>
                                        <a href="{{ route('commision.extras', $goal_id) }}" class="btn btn-warning btn-xs">
                                            <i class="fa fa-plus"></i>&nbsp;&nbsp;EXT
                                        </a>
                                    </div>
                                    @else
                                    <a href="{{ route('commision.report', $goal_id) }}" class="btn btn-success btn-xs" target="_blank">
                                        <i class="fa fa-print"></i>&nbsp;&nbsp;REPORTE
                                    </a>
                                    @endif
                                </td>
                                <td></td>
                                @for ($i=1; $i < 6; $i++)
                                    <td><a href="{{ route('commision.edit', [$goal_id, $i]) }}" class="btn btn-{{ $relation->color }} btn-xs"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Agregar venta</a></td>
                                @endfor
                                <th style="text-align: center;">{{ $total_sc }}</th>
                                <th style="text-align: center;">{{ $total_ext }} | {{ fnumber($total_amount_ext) }}</th>
                            </tr>
                        </template>
                    </data-table>
                </solid-box>
            </div>
        </div>
    @endforeach
@endsection
