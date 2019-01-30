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
                </color-box>
            </div>
        @endforeach
        @foreach ($complete as $store_id => $wastes)
            <div class="col-md-6">
                <color-box title="Destruidos de {{ App\Store::find($store_id)->name }}" color="{{ App\Store::find($store_id)->color }}" button collapsed>
                    <data-table example="{{ $store_id }}">
                        {{ drawHeader('Folio','Modelo', 'Descripción', 'Pos') }}
                        <template slot="body">
                            @foreach($wastes as $waste)
                                <tr>
                                    <td>{{ $waste->id }}</td>
                                    <td>{{ $waste->item }}</td>
                                    <td>
                                        {{ $waste->description }}<br>
                                        {{ fdate($waste->created_at, 'd-M-y') }}
                                    </td>
                                    <td>
                                        {{ $waste->pos }}<br>
                                        {{ fdate($waste->pos_at, 'd-M-y', 'Y-m-d') }}
                                    </td>
                                </tr>
                            @endforeach
                        </template>
                    </data-table>
                </color-box>
            </div>
        @endforeach
    </div>
@endsection
