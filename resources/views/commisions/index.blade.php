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
    <div class="row">
        <div class="col-md-12">
            <color-box title="Comisiones" color="success">
                <data-table example="1">
                    {{ drawHeader('Nombre', '','Semana 1', 'Semana 2', 'Semana 3', 'Semana 4', 'Semana 5', 'SC', 'Ext', '<i class="fa fa-cogs"></i>') }}

                    <template slot="body">
                        @foreach($employers as $employer)
                            <tr>
                                <td>{{ $employer->first()->employer->nickname }}</td>
                                <td>
                                    <b>Meta:</b><br>
                                    <b>Venta:</b>
                                </td>
                                @foreach ($employer as $goal)
                                    <td>
                                        {{ fnumber($goal->goal) }} <br>
                                        {{ fnumber($goal->sale) }}
                                    </td>
                                @endforeach
                                <td>
                                    <br>
                                    {{ $employer->sum('sterencard')}}
                                </td>
                                <td>
                                    <br>
                                    {{ $employer->sum('extensions')}}
                                </td>
                                <td>
                                    <dropdown icon="cogs" color="{{ auth()->user()->store->color }}">
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
                            <td><a href="{{ route('commision.edit', [$goal_id, 1]) }}" class="btn btn-success btn-xs"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Agregar venta</a></td>
                            <td><a href="{{ route('commision.edit', [$goal_id, 2]) }}" class="btn btn-success btn-xs"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Agregar venta</a></td>
                            <td><a href="{{ route('commision.edit', [$goal_id, 3]) }}" class="btn btn-success btn-xs"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Agregar venta</a></td>
                            <td><a href="{{ route('commision.edit', [$goal_id, 4]) }}" class="btn btn-success btn-xs"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Agregar venta</a></td>
                            <td><a href="{{ route('commision.edit', [$goal_id, 5]) }}" class="btn btn-success btn-xs"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Agregar venta</a></td>
                            <td></td><td></td><td></td>
                        </tr>
                    </template>
                </data-table>
            </solid-box>
        </div>
    </div>
@endsection
