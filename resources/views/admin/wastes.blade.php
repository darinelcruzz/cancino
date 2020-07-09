@extends('lte.root')
@push('pageTitle')
    -$200 | Lista
@endpush

@section('content')
    <div class="row">
        @foreach ($pendings as $store_id => $wastes)
            <div class="col-md-6">
                <color-box title="Pendientes de {{ App\Store::find($store_id)->name . ' ' . count($wastes) }}" color="danger" button collapsed>
                    <data-table example="{{ $store_id }}">
                        {{ drawHeader('Folio','Modelo', 'Descripción', 'Fecha') }}
                        <template slot="body">
                            @foreach($wastes as $waste)
                                <tr>
                                    <td>{{ $waste->id }}</td>
                                    <td>{{ $waste->item }}</td>
                                    <td>{{ $waste->description }}</td>
                                    <td>{{ fdate($waste->created_at, 'd-M-y') }}</td>
                                </tr>
                            @endforeach
                        </template>
                    </data-table>
                    <hr>
                    <a href="{{ route('wastes.edit', ['store' => $store_id])}}" class="btn btn-block btn-danger">Destruir</a><br>
                    <a href="{{ route('wastes.print', $store_id) }}" class="btn btn-github btn-sm btn-block" target="_blank">
                        <i class="fa fa-print"></i>&nbsp;&nbsp;IMPRIMIR PENDIENTES
                    </a>
                </color-box>
            </div>
        @endforeach

        <div class="col-md-6">
            <color-box title="Destruidos" color="vks" button collapsed>
                <data-table example="1">
                    {{ drawHeader('POS', '<i class="fa fa-cogs"></i>', 'fecha', 'tienda', '<i class="fa fa-photo"></i>') }}
                    <template slot="body">
                        @foreach($complete as $pos => $wastes)
                            <tr>
                                <td>{{ $pos }}</td>
                                <td>
                                    <dropdown icon="cogs" color="github">
                                        <ddi icon="eye" to="{{ route('pos.show', $pos) }}" text="Detalles"></ddi>
                                        <ddi icon="photo" to="{{ route('pos.upload', $pos) }}" text="Subir foto"></ddi>
                                    </dropdown>
                                </td>
                                <td>
                                    {{ fdate($wastes->first()->pos_at, 'd-M-y', 'Y-m-d') }}
                                </td>
                                <td>{{ $wastes->first()->store->name }}</td>
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
