@extends('lte.root')
@push('pageTitle')
    Clientes | Lista
@endpush

@push('headerTitle')
    <a href="{{ route('clients.create') }}" class="btn btn-success btn-xs"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Agregar</a>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Clientes" color="success">
                <data-table example="1">
                    {{ drawHeader('ID','Comercial', 'Ubicación', 'Datos', 'Contacto', '<i class="fa fa-cogs"></i>') }}

                    <template slot="body">
                        @foreach($clients as $client)
                            <tr>
                                <td>{{ $client->id }}</td>
                                <td>
                                    <b>{{ $client->business }}</b><br>
                                    {{ $client->rfc }}
                                </td>
                                <td>
                                    {{ $client->address }}<br>
                                    {{ $client->city }}
                                </td>
                                <td>
                                    {{ $client->email }}<br>
                                    {{ $client->phone }}
                                </td>
                                <td>
                                    {{ $client->contact }} ({{ $client->position }})<br>
                                    {{ $client->cellphone }}
                                </td>
                                <td>
                                    <dropdown icon="cogs" color="{{ auth()->user()->store->color }}">
                                        <ddi to="{{ route('clients.show', ['id' => $client->id]) }}" icon="eye" text="Detalles"></ddi>
                                        <ddi to="{{ route('clients.edit', ['id' => $client->id]) }}" icon="edit" text="Editar"></ddi>
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
