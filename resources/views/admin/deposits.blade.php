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


    {!! Form::open(['method' => 'post', 'route' => 'admin.deposits']) !!}
        
        <div class="row">
            <div class="col-md-3 pull-right">
                <div class="input-group input-group-sm">
                    <input type="month" name="date" class="form-control" value="{{ $date }}">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </div>
        </div>

    {!! Form::close() !!}

    <br>

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

                                    @foreach([2, 3, 4, 5] as $store_id)
                                        <td>
                                            {{ fdate($stores->where('store_id', $store_id)->pluck('date_deposit')->pop(), 'd/M/y', 'Y-m-d') }}<br>
                                            {{ fnumber($stores->where('store_id', $store_id)->sum('cash')) }}
                                            <span style="color:{{ colorDay($date, $stores->where('store_id', $store_id)->pluck('date_deposit')->pop()) }}">
                                                <i class="fa fa-circle"></i>
                                            </span><br>
                                            {{ $stores->where('store_id', $store_id)->pluck('observations')->pop() }}
                                            @if ($stores->where('store_id', $store_id)->pluck('status')->pop() == 'depositado')
                                                <modal-button target="{{ $stores->where('store_id', $store_id)->pluck('id')->pop() }}"><i class="fa fa-check"></i></modal-button>
                                                @include('templates/checkModal')
                                            @endif
                                        </td>
                                    @endforeach

                                    <td>
                                        {{ fdate($stores->where('store_id', 6)->pluck('date_deposit')->pop(), 'd/M/y', 'Y-m-d') }}<br>
                                        {{ fnumber($stores->where('store_id', 6)->sum('cash')) }}
                                        <span style="color:{{ colorDay($date, $stores->where('store_id', 6)->pluck('date_deposit')->pop()) }}">
                                            <i class="fa fa-circle"></i>
                                        </span><br>
                                        {{ $stores->where('store_id', 6)->pluck('observations')->pop() }}
                                        @if ($stores->where('store_id', 6)->pluck('status')->pop() == 'depositado')
                                            <a href="{{ route('sales.check', ['id' => $stores->where('store_id', 6)->pluck('id')->pop()]) }}" class="btn btn-xs btn-success"><i class="fa fa-check"></i></a>
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
