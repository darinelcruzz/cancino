@extends('lte.root')

@push('pageTitle', 'Grupos y proveedores')

@push('headerTitle')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('providers.create') }}" class="btn btn-github btn-xs pull-left">
                <i class="fa fa-plus-square"></i>&nbsp;&nbsp;AGREGAR
            </a>

            <a href="{{ route('expenses_groups.create') }}" class="btn btn-github btn-xs pull-right">
                <i class="fa fa-plus-square"></i>&nbsp;&nbsp;AGREGAR
            </a>
        </div>
    </div>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-6">
            <color-box title="Proveedores" color="vks">
                <data-table example="1">
                    {{ drawHeader('ID', '<i class="fa fa-cogs"></i>', 'nombre', 'grupo') }}

                    <template slot="body">
                        @foreach($providers as $provider)
                            <tr>
                                <td>{{ $provider->id }}</td>
                                <td>
                                    <dropdown icon="cogs" color="github">
                                        <ddi icon="edit" to="{{ route('providers.edit', $provider) }}" text="Editar"></ddi>
                                    </dropdown>
                                </td>
                                <td>{{ strtoupper($provider->business) }}</td>
                                <td>{{ $provider->expenses_group->name ?? 'No pertenece a uno' }}</td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>

        <div class="col-md-6">
            <color-box title="Grupos" color="vks">
                <data-table example="2">
                    {{ drawHeader('ID', '<i class="fa fa-cogs"></i>', 'nombre', 'tipo') }}

                    <template slot="body">
                        @foreach($expenses_groups as $expenses_group)
                            <tr>
                                <td>{{ $expenses_group->id }}</td>
                                <td>
                                    <dropdown icon="cogs" color="github">
                                        <ddi icon="edit" to="{{ route('expenses_groups.edit', $expenses_group) }}" text="Editar"></ddi>
                                    </dropdown>
                                </td>
                                <td>{{ $expenses_group->name }}</td>
                                <td>
                                    <label class="label label-{{ $expenses_group->type == 'abono' ? 'success': 'warning' }}">
                                        <small>{{ strtoupper($expenses_group->type) }}</small>
                                    </label>
                                </td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
        
    </div>
@endsection
