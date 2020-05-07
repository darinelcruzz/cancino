@extends('lte.root')

@push('pageTitle', 'Compras | Lista')

@push('headerTitle')
    <div class="row">
        @empty ($stores)
            <div class="col-md-2">
                <a href="{{ route('shoppings.create') }}" class="btn btn-success btn-xs">
                    <i class="fa fa-plus-square"></i>&nbsp;&nbsp;AGREGAR
                </a>
            </div>
            <div class="col-md-6">
            </div>
        @endempty
        <div class="col-md-4">
            @include('templates/month_select', ['route' => 'shoppings.index', 'date' => $date])
        </div>
    </div>
@endpush

@section('content')
    @forelse ($stores as $store)
        <div class="row">
            <div class="col-md-12">
                <color-box title="{{ $store->name }}" color="{{ $store->color }}" label="{{ $shoppings->where('store_id', $store->id)->where('status', 'pendiente')->count() }}" button collapsed>
                    <data-table example="{{ $store->id }}">
                        {{ drawHeader('ID', 'Folio','Fecha', 'Monto', 'Tipo', 'Doc POS', 'Estado', '') }}
                        <template slot="body">
                            @foreach($shoppings->where('store_id', $store->id) as $shopping)
                                <tr>
                                    <td>{{ $shopping->id }}</td>
                                    <td>{{ $shopping->folio }}</td>
                                    <td>{{ fdate($shopping->date, 'd M Y', 'Y-m-d') }}</td>
                                    <td>{{ fnumber($shopping->amount) }}</td>
                                    <td>{{ $shopping->type }}</td>
                                    <td>{{ $shopping->document }}</td>
                                    <td>
                                        <span class="label label-{{ $shopping->status != 'pendiente' ? 'success': 'danger'}}">
                                            {{ ucfirst($shopping->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <dropdown icon="cogs" color="{{ $store->color }}">
                                            {{-- <ddi to="{{ route('notes.capture', ['id'=>$shopping->id]) }}" icon="check" text="Aplicar"></ddi> --}}
                                        </dropdown>
                                    </td>
                                </tr>
                            @endforeach
                        </template>
                    </data-table>
                    <br>
                        <a class="btn btn-xs btn-success btn-block" href="{{ route('shoppings.verify', ['store' => $store]) }}">Verificar</a>
                </color-box>
            </div>
        </div>
    @empty
        <div class="row">
            <div class="col-md-12">
                <color-box title="Compras" color="primary">
                    <data-table example="1">
                        {{ drawHeader('ID', 'Folio','Fecha', 'Monto', 'Tipo', 'Doc POS') }}

                        <template slot="body">
                            @foreach($shoppings as $shopping)
                                <tr>
                                    <td>{{ $shopping->id }}</td>
                                    <td>{{ $shopping->folio }}</td>
                                    <td>{{ fdate($shopping->date, 'd M Y', 'Y-m-d') }}</td>
                                    <td>{{ fnumber($shopping->amount) }}</td>
                                    <td>{{ $shopping->type }}</td>
                                    <td>{{ $shopping->document }}</td>
                                </tr>
                            @endforeach
                        </template>
                    </data-table>
                </solid-box>
            </div>
        </div>
    @endforelse
@endsection
