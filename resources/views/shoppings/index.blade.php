@extends('lte.root')

@push('pageTitle', 'Compras | Lista')

@push('headerTitle')
    <a href="{{ route('shoppings.create') }}" class="btn btn-success btn-xs">
        <i class="fa fa-plus-square"></i>&nbsp;&nbsp;AGREGAR
    </a>
@endpush

@section('content')
    <div class="row">

     @forelse ($stores as $store)
        <div class="col-md-12">
            <color-box title="{{ $store->name }}" color="{{ $store->color }}" label="{{ $shoppings->where('store_id', $store->id)->where('status', 'pendiente')->count() }}" button collapsed>
                <data-table example="{{ $loop->iteration }}">
                    {{ drawHeader('ID', 'Folio','Fecha', 'Monto', 'Tipo', 'Doc POS', 'Estado') }}
                    <template slot="body">
                        @foreach($shoppings->where('store_id', $store->id)->where('status', 'pendiente') as $shopping)
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
                            </tr>
                        @endforeach
                    </template>
                </data-table>
                <br>
                    <a class="btn btn-xs btn-success btn-block" href="{{ route('shoppings.verify', ['store' => $store]) }}">Verificar</a>
            </color-box>
        </div>
    @empty
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

    @endforelse
    
    <div class="col-md-12">
        <color-box title="Verificadas" color="success" button collapsed>
            <data-table example="7">
                {{ drawHeader('ID', 'Tienda', 'Folio','Fecha', 'Monto', 'Tipo', 'Doc POS', 'Estado') }}
                <template slot="body">
                    @foreach($shoppings->where('status', 'verificado') as $shopping)
                        <tr>
                            <td>{{ $shopping->id }}</td>
                            <td>{{ $shopping->store->name }}</td>
                            <td>{{ $shopping->folio }}</td>
                            <td>{{ fdate($shopping->date, 'd M Y', 'Y-m-d') }}</td>
                            <td>{{ fnumber($shopping->amount) }}</td>
                            <td>{{ $shopping->type }}</td>
                            <td>{{ $shopping->document }}</td>
                            <td>
                                <span class="label label-success">
                                    {{ ucfirst($shopping->status) }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </template>
            </data-table>
        </color-box>
    </div>
    
</div>
@endsection
