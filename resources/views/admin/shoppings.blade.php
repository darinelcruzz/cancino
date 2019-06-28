@extends('lte.root')
@push('pageTitle')
    Compras | Lista
@endpush

@section('content')
    @for ($i=2; $i < 7; $i++)
        <div class="col-md-12">
            <color-box title="{{ App\Store::find($i)->name }}" color="{{ App\Store::find($i)->color }}" label="{{ $shoppings->where('store_id', $i)->where('status', 'pendiente')->count() }}" button collapsed>
                <data-table example="{{ $i }}">
                    {{ drawHeader('ID', 'Folio','Fecha', 'Monto', 'Tipo', 'Doc POS', 'Estado') }}
                    <template slot="body">
                        @foreach($shoppings->where('store_id', $i)->where('status', 'pendiente') as $shopping)
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
                                    </span> &nbsp;&nbsp;&nbsp;
                                    {{-- <dropdown icon="cogs" color="primary">
                                        <ddi to="{{ route('admin.verify', ['id' => $shopping->id]) }}" icon="check" text="Verificada"></ddi>
                                        <ddi to="{{ route('admin.verify', ['id' => $shopping->id]) }}" icon="edit" text="Duplicada"></ddi>
                                    </dropdown> --}}
                                </td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
    @endfor
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
@endsection
