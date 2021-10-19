@extends('lte.root')

@push('pageTitle', 'Productos en uso')

@section('content')
    <div class="row">
        @foreach ($pending as $store_id => $taken_products)
            <div class="col-md-6">
                <color-box title="Pendientes de {{ App\Store::find($store_id)->name . ' (' . count($taken_products) }})" color="danger" button collapsed solid>
                    <data-table example="{{ $store_id }}">
                        {{ drawHeader('fecha', 'modelo', 'cantidad', 'motivo', 'usuario') }}
                        <template slot="body">
                            @foreach($taken_products as $taken_product)
                                <tr>
                                    <td>{{ fdate($taken_product->taken_at, 'd/M/y', 'Y-m-d') }}</td>
                                    <td>{{ $taken_product->code }}</td>
                                    <td>{{ $taken_product->quantity }}</td>
                                    <td>{{ $taken_product->observations }}</td>
                                    <td>{{ $taken_product->user->name }}</td>
                                </tr>
                            @endforeach
                        </template>
                    </data-table>
                    <hr>
                    <a href="{{ route('taken_products.edit', $store_id)}}" class="btn pull-right btn-danger">
                        <i class="fa fa-trash"></i>&nbsp;&nbsp;DESTRUIR
                    </a>
                    <a href="{{ route('taken_products.print', $store_id) }}" class="btn btn-github pull-left" target="_blank">
                        <i class="fa fa-print"></i>&nbsp;&nbsp;IMPRIMIR
                    </a>
                </color-box>
            </div>
        @endforeach

        <div class="col-md-6">
            <color-box title="Destruidos" color="vks" button collapsed>
                <data-table example="1">
                    {{ drawHeader('POS', '<i class="fa fa-cogs"></i>', 'fecha', 'tienda', '<i class="fa fa-photo"></i>') }}
                    <template slot="body">
                        @foreach($deleted as $pos => $taken_products)
                            <tr>
                                <td>{{ $pos }}</td>
                                <td>
                                    <dropdown icon="cogs" color="github">
                                        <ddi icon="eye" to="{{ route('pos.show', $pos) }}" text="Detalles"></ddi>
                                        <ddi icon="photo" to="{{ route('pos.upload', $pos) }}" text="Subir foto"></ddi>
                                    </dropdown>
                                </td>
                                <td>
                                    {{ fdate($taken_products->first()->deleted_at, 'd/M/y', 'Y-m-d') }}
                                </td>
                                <td>{{ $taken_products->first()->store->name }}</td>
                                <td>
                                    @if(Storage::disk('public')->exists('pos/' . $pos . '.jpg'))
                                        <img v-img src="{{ Storage::disk('public')->url('pos/' . $pos . '.jpg') }}"
                                            alt="foto de {{ $pos }}"
                                            width="50px" height="50px"
                                            style="border-radius: 50%;">
                                    @else
                                        <img src="{{ asset('images/placeholder_image.png') }}"
                                            width="50px" height="40px">
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
    </div>
@endsection
