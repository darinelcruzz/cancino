@extends('lte.root')
@push('pageTitle')
    Compras | Lista
@endpush

@section('content')
    @foreach ($stores as $store)
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
    @endforeach
    <div class="col-md-12">
        <color-box title="Verificadas" color="success" button collapsed>
            <data-table example="{{ count($stores) + 2 }}">
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
@endsection
