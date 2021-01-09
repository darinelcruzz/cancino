@extends('lte.root')

@push('pageTitle', 'Compras | Lista')

@push('headerTitle')
    <div class="row">
        <div class="col-md-2">
            <a href="{{ route('shoppings.create') }}" class="btn btn-github btn-xs">
                <i class="fa fa-plus-square"></i>&nbsp;&nbsp;AGREGAR
            </a>
        </div>
        <div class="col-md-6"></div>
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
                        {{ drawHeader('Folio','Fecha', 'Monto', 'Tipo', 'Doc POS', 'Estado', '') }}
                        <template slot="body">
                            @foreach($shoppings->where('store_id', $store->id) as $shopping)
                                <tr>
                                    <td>{{ $shopping->prefix }}{{ $shopping->folio }}</td>
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
                            @foreach($notes->where('store_id', $store->id) as $note)
                                <tr>
                                    <td>ANSM-{{ $note->folio }}</td>
                                    <td>{{ fdate($note->date_nc, 'd M Y', 'Y-m-d') }}</td>
                                    <td>{{ fnumber($note->amount) }}</td>
                                    <td>nota producto</td>
                                    <td>{{ $note->document }}</td>
                                    <td>
                                        <span class="label label-{{ $note->status == 'aplicada' ? 'success' : ($note->status == 'pendiente' ? 'danger' : 'warning') }}">
                                            {{ ucfirst($note->status) }}
                                        </span>
                                    </td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </template>
                        <template slot="footer">
                            <tr>
                                <td colspan="2" align="right"><b>Total</b></td>
                                <td>{{ fnumber($shoppings->where('store_id', $store->id)->sum('amount')) }}</td>
                                <td colspan="4"></td>
                            </tr>
                        </template>
                    </data-table>
                    <br>
                        <a class="btn btn-xs btn-success btn-block" href="{{ route('shoppings.verify', $store) }}">Verificar</a>
                </color-box>
            </div>
        </div>
    @empty
        <div class="row">
            <div class="col-md-12">
                <color-box title="Compras" color="vks">
                    <data-table example="1">

                        <template slot="header">
                            <tr>
                                <th style="width: 5%">ID</th>
                                <th style="width: 5%"><i class="fa fa-cogs"></i></th>
                                <th>Folio</th>
                                <th style="text-align: center;">Tipo</th>
                                <th>F. Compra</th>
                                <th>F. Factura</th>
                                <th>POS</th>
                                <th style="text-align: center;">Monto</th>
                                <th style="text-align: center;">Estado</th>
                            </tr>
                        </template>

                        <template slot="body">
                            @foreach($shoppings as $shopping)
                                <tr>
                                    <td>{{ $shopping->id }}</td>
                                    <td>
                                        <dropdown icon="cogs" color="github">
                                            <ddi icon="edit" to="{{ route('shoppings.edit', $shopping) }}" text="Editar"></ddi>
                                        </dropdown>
                                    </td>
                                    <td>{{ $shopping->folio }}</td>
                                    <td style="text-align: center;">{{ strtoupper($shopping->type) }}</td>
                                    <td>{{ fdate($shopping->date, 'd M Y', 'Y-m-d') }}</td>
                                    <td>{{ fdate($shopping->invoiced_at, 'd M Y', 'Y-m-d', '') }}</td>
                                    <td>{{ $shopping->document }}</td>
                                    <td style="text-align: right;">{{ number_format($shopping->amount, 2) }}</td>
                                    <td style="text-align: center;"><span class="label label-{{ $shopping->status == 'verificado' ? 'success': 'warning' }}"><small>{{ strtoupper($shopping->status) }}</span></small></td>
                                </tr>
                            @endforeach
                        </template>
                    </data-table>
                </solid-box>
            </div>
        </div>
    @endforelse
@endsection
