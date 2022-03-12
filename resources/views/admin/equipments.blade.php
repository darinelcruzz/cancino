@extends('lte.root')
@push('pageTitle')
    Equipos | Lista
@endpush

@push('headerTitle')
    <a href="{{ route('equipments.create') }}" class="btn btn-success btn-xs"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;AGREGAR</a>
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
                                        <ddi to="{{ route('equipments.show', $equipment) }}" icon="eye" text="Detalles"></ddi>
                                        <ddi to="{{ route('maintenances.create', ['equipment' => $equipment]) }}" icon="plus" text="Mantenimiento"></ddi>
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
