@extends('lte.root')
@push('pageTitle')
    Equipos | Lista
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Equipos" color="success">
                <data-table example="1">
                    {{ drawHeader('id', 'nombre', 'tienda', 'anterior', 'próximo', '<i class="fa fa-cogs"></i>') }}
                    <template slot="body">
                        @foreach($equipments as $equipment)
                            <tr>
                                <td>{{ $equipment->id }}</td>
                                <td>
                                    <b>{{ $equipment->name }}</b><br>
                                    {{ $equipment->type }}
                                </td>
                                <td>{{ $equipment->store->name }}</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <dropdown icon="cogs" color="{{ auth()->user()->store->color }}">
                                        <ddi to="{{ route('equipments.show', ['id' => $equipment->id]) }}" icon="eye" text="Detalles"></ddi>
                                        {{-- <ddi to="#" icon="edit" text="Editar"></ddi>
                                        <ddi to="#" icon="times" text="Dar de baja"></ddi> --}}
                                    </dropdown>
                                </td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
    </div>
@endsection
