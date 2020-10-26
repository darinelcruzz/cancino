@extends('lte.root')

@push('pageTitle', 'Inventarios')

@push('headerTitle')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('inventory.create') }}" class="btn btn-github btn-xs pull-left">
                <i class="fa fa-plus-square"></i>&nbsp;&nbsp;AGREGAR
            </a>
        </div>
    </div>
@endpush

@section('content')
    <div class="col-md-8">
        <color-box title="Inventarios" color="vks" solid>
            <table id="example1" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tienda</th>
                        <th>Inicio</th>
                        <th>Final</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($inventories as $inventory)
                        <tr>
                            <td>{{ $inventory->id }}</td>
                            <td>{{ $inventory->store->name }}</td>
                            <td>{{ $inventory->started_at }}</td>
                            <td>{{ $inventory->ended_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </color-box>
    </div>
@endsection
