@extends('lte.root')
@push('pageTitle')
    Eventos | Lista
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="En curso" color="danger">
                <data-table example="1">
                    {{ drawHeader('ID','fecha', 'nombre', 'presupuesto', 'gastado') }}
                    <template slot="body">
                        @foreach($pendings as $event)
                            <tr>
                                <td>{{ $event->id }}</td>
                                <td>{{ fdate($event->start_at, 'd/M/y', 'Y-m-d') }}</td>
                                <td>{{ $event->name }}</td>
                                <td>{{ $event->budget }}</td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </solid-box>
        </div>
        <div class="col-md-12">
            <color-box title="Terminados" color="success" collapsed button>
                <data-table example="2">
                    {{ drawHeader('ID','fecha', 'nombre', 'presupuesto', 'gastado') }}
                    <template slot="body">
                        @foreach($pendings as $event)
                            <tr>
                                <td>{{ $event->id }}</td>
                                <td>{{ fdate($event->start_at, 'd/M/y', 'Y-m-d') }} <br> {{ fdate($event->end_at, 'd/M/y', 'Y-m-d') }}</td>
                                <td>{{ $event->name }}</td>
                                <td>{{ $event->budget }}</td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </solid-box>
        </div>
    </div>
@endsection
