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
        @endphp
        <div class="row">
            <div class="col-md-12">
                <color-box title="Comisiones de {{ $relation->name }}" color="{{ $relation->color }}">
                    <data-table example="{{ $relation->id }}">
                        {{ drawHeader('Nombre', '','Semana 1', 'Semana 2', 'Semana 3', 'Semana 4', 'Semana 5', 'SC', 'Ext', '<i class="fa fa-cogs"></i>') }}

                        <template slot="body">
                            @foreach($store as $employer)
                                <tr>
                                    <td>{{ $employer->first()->employer->nickname }}</td>
                                    <td>
                                        <b>Meta:</b><br>
                                        <b>Venta:</b>
                                    </td>
                                    @foreach ($employer as $goal)
                                        <td>
                                            <span style="color: {{ $goal->weekly_goal > 0 ? 'black': 'gray' }};">{{ fnumber($goal->weekly_goal) }}</span><br>
                                            <span style="color: {{ $goal->sale > 0 ? 'black': 'gray' }};">{{ fnumber($goal->sale) }}</span>
                                        </td>
                                    @endforeach
                                    <td>
                                        {{ $employer->sum('sterencard')}}
                                    </td>
                                    <td>
                                        {{ $employer->sum('extensions')}}
                                    </td>
                                    <td>
                                        <dropdown icon="cogs" color="{{ $relation->color }}">
                                            {{-- <ddi to="{{ route('clients.show', ['id' => $client->id]) }}" icon="eye" text="Detalles"></ddi>
                                            <ddi to="{{ route('clients.edit', ['id' => $client->id]) }}" icon="edit" text="Editar"></ddi>
                                            <ddi to="#" icon="times" text="Dar de baja"></ddi> --}}
                                        </dropdown>
                                    </td>
                                </tr>
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
                                <td></td><td></td>
                                @for ($i=1; $i < 6; $i++)
                                    <td><a href="{{ route('commision.edit', [$goal_id, $i]) }}" class="btn btn-{{ $relation->color }} btn-xs"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Agregar venta</a></td>
                                @endfor
                                <td></td><td></td><td></td>
                            </tr>
                        </template>
                    </data-table>
                </solid-box>
            </div>
        </div>
    @endforeach
@endsection
