@extends('lte.root')
@push('pageTitle')
    Equipos | Lista
@endpush

@push('headerTitle')
    <a href="{{ route('maintenances.create') }}" class="btn btn-success btn-xs"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;AGREGAR</a>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Equipos" color="success">
                <data-table example="1">
                    {{ drawHeader('id', 'nombre', 'tienda', 'anterior', 'próximo', '<i class="fa fa-eye"></i>') }}
                    <template slot="body">
                        @foreach($maintenances as $maintenance)
                            <tr>
                                <td>{{ $maintenance->id }}</td>
                                <td>
                                    <b>{{ $maintenance->name }}</b><br>
                                    {{ $maintenance->equipment }}
                                </td>
                                <td>{{ $maintenance->store->name }}</td>
                                <td>
                                    {{ fdate($maintenance->maintenance_at, 'd/M/y', 'Y-m-d') }} <br>
                                    {{ $maintenance->provider }} - {{ $maintenance->type }}
                                </td>
                                <td>
                                    {{ fdate($maintenance->maintenance_at, 'd/M/y', 'Y-m-d') }}
                                </td>
                                <td>
                                    <dropdown icon="cogs" color="{{ auth()->user()->store->color }}">
                                        <ddi to="{{ route('maintenances.show', ['id' => $maintenance->id]) }}" icon="eye" text="Detalles"></ddi>
                                        <ddi to="#" icon="edit" text="Editar"></ddi>
                                        <ddi to="#" icon="times" text="Dar de baja"></ddi>
                                    </dropdown>
                                </td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </solid-box>
        </div>
    </div>
@endsection
