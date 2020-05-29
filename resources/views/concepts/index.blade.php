@extends('lte.root')

@push('pageTitle', 'Conceptos')

@push('headerTitle')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('concepts.create') }}" class="btn btn-github btn-xs pull-left">
                <i class="fa fa-plus-square"></i>&nbsp;&nbsp;AGREGAR
            </a>
        </div>
    </div>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-6">
            <color-box title="Conceptos" color="vks">

                <table example="1" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descripción</th>
                            <th>Proveedor</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($concepts as $concept)
                            <tr>
                                <td>{{ $concept->id }}</td>
                                <td>{{ $concept->description }}</td>
                                <td>{{ $concept->provider->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </color-box>
        </div>
        
    </div>
@endsection