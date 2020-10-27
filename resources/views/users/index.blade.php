@extends('lte.root')
@push('pageTitle')
    Usuarios | Lista
@endpush

@push('headerTitle')
    <a href="{{ route('users.create') }}" class="btn btn-github btn-xs"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;AGREGAR</a>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Usuarios" color="vks">
                <data-table example="1">
                    {{ drawHeader('ID', '<i class="fa fa-cogs"></i>', 'Usuario', 'Nivel', 'Tienda') }}

                    <template slot="body">
                        @foreach($users as $user)
                            <tr>
                                <td style="width: 5%;">{{ $user->id }}</td>
                                <td style="width: 5%;">
                                    <dropdown icon="cogs" color="github">
                                        <ddi icon="edit" to="{{ route('users.edit', $user) }}" text="Editar"></ddi>
                                    </dropdown>
                                </td>
                                <td>{{ $user->name }} <br> <code>{{ $user->username }}</code></td>
                                <td>{{ $user->level }}</td>
                                <td>{{ $user->store->name }}</td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
    </div>

@endsection
