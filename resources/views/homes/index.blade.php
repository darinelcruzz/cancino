@extends('lte.root')

@push('pageTitle', 'Servicios | Lista')

@push('headerTitle')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('homes.create') }}" class="btn btn-github btn-xs pull-left">
                <i class="fa fa-plus-square"></i>&nbsp;&nbsp;AGREGAR
            </a>
        </div>
    </div>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Pendientes" color="vks" solid>
                <data-table example="11">
                    {{ drawHeader('ID', '<i class="fa fa-cogs"></i>' ,'name', 'dirección', 'ciudad', 'teléfono') }}

                    <template slot="body">
                        @foreach($homes as $home)
                            <tr>
                                <td>{{ $home->id }}</td>
                                <td>
                                    <dropdown icon="cogs" color="github">
                                        <ddi icon="edit" to="{{ route('homes.edit', $home) }}" text="Editar"></ddi>
                                    </dropdown>
                                </td>
                                <td>{{ $home->name }}</td>
                                <td>{{ $home->address }}</td>
                                <td>{{ $home->city }}</td>
                                <td>{{ $home->phone }}</td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
    </div>

@endsection

