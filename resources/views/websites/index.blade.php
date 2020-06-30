@extends('lte.root')

@push('pageTitle', 'Portales')

@push('headerTitle')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('websites.create') }}" class="btn btn-github btn-xs pull-left">
                <i class="fa fa-plus-square"></i>&nbsp;&nbsp;AGREGAR
            </a>
        </div>
    </div>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-8">
            <color-box title="Portales" color="vks">

                <table example="1" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th><i class="fa fa-cogs"></i></th>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>Contraseña</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($websites as $website)
                            <tr>
                                <td>{{ $website->id }}</td>
                                <td>
                                    <dropdown icon="cogs" color="github">
                                        <ddi icon="edit" to="{{ route('websites.edit', $website) }}" text="Editar"></ddi>
                                    </dropdown>
                                </td>
                                <td>
                                    <a href="{{ $website->url }}" target="_blank">
                                        {{ $website->name }}
                                    </a>
                                </td>
                                <td>{{ $website->username }}</td>
                                <td>{{ $website->password }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </color-box>
        </div>
        
    </div>
@endsection
