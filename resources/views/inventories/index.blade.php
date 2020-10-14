@extends('lte.root')

@push('pageTitle', 'Inventarios')

@section('content')
    <div class="col-md-8">
        <color-box title="Inventarios" color="vks" solid>
            <table class="table table-striped table-bordered no-pagination">
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
