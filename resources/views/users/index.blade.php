@extends('lte.root')
@push('pageTitle')
    Usuarios | Lista
@endpush

@push('headerTitle')
    <a href="{{ route('users.create') }}" class="btn btn-success btn-xs"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;AGREGAR</a>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Compras" color="primary">
                <data-table example="1">
                    {{ drawHeader('ID', 'Nombre','Usuario', 'Nivel', 'Tienda') }}

                    <template slot="body">
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->level }}</td>
                                <td>{{ $user->store->name }}</td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </solid-box>
        </div>
    </div>

@endsection
