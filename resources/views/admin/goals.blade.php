@extends('lte.root')
@push('pageTitle')
    Metas | Lista
@endpush

@push('headerTitle')
    @if (auth()->user()->level == 1)
        <a href="{{ route('goals.create') }}" class="btn btn-success btn-xs"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Agregar</a>
    @endif
@endpush

@section('content')
    @foreach ($dates as $month => $years)
        <div class="row">
            <div class="col-md-12">
                <color-box title="{{ ucfirst(fdate($month, 'F', 'm')) }}" color="primary" solid button {{ date('m') == $month ? '': 'collapsed' }}>
                    <data-table classes="ordered">
                        {{ drawHeader('Fecha','Chiapas', 'Soconusco', 'Altos', 'Gale Tux', 'Gale Tapa', '<i class="far fa-edit"></i>') }}
                        <template slot="body">
                            @foreach ($years as $date => $stores)
                                <tr>
                                    <td>
                                        {{ $date }} &nbsp; <modal-button target="{{ $month . $date }}"><i class="fa fa-flag"></i></modal-button>
                                        @include('templates/goalsModal')
                                    </td>
                                    <td>{{ fnumber($stores->where('store_id', 2)->sum('sale')) }} {!! empty($stores->where('store_id', 2)->first()) ? '' : $stores->where('store_id', 2)->first()->pointLabel !!}</td>
                                    <td>{{ fnumber($stores->where('store_id', 3)->sum('sale')) }} {!! empty($stores->where('store_id', 3)->first()) ? '' : $stores->where('store_id', 3)->first()->pointLabel !!}</td>
                                    <td>{{ fnumber($stores->where('store_id', 4)->sum('sale')) }} {!! empty($stores->where('store_id', 4)->first()) ? '' : $stores->where('store_id', 4)->first()->pointLabel !!}</td>
                                    <td>{{ fnumber($stores->where('store_id', 5)->sum('sale')) }} {!! empty($stores->where('store_id', 5)->first()) ? '' : $stores->where('store_id', 5)->first()->pointLabel !!}</td>
                                    <td>{{ fnumber($stores->where('store_id', 6)->sum('sale')) }} {!! empty($stores->where('store_id', 6)->first()) ? '' : $stores->where('store_id', 6)->first()->pointLabel !!}</td>
                                    <td>
                                        @if ($stores->where('store_id', 2)->sum('sale') == NULL)
                                            <a href="{{ route('goals.edit', [$month, $date])}}"><i class="fa fa-edit"></i></a>
                                        @endif
                                    </td>
                                </tr>

                            @endforeach
                        </template>
                    </data-table>
                </solid-box>
            </div>
        </div>
    @endforeach
@endsection
