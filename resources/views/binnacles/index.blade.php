@extends('lte.root')
@push('pageTitle')
    Bitácora | Lista
@endpush

@push('headerTitle')
    <a href="{{ route('binnacles.create') }}" class="btn btn-success btn-xs"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Agregar</a>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Bitácora" color="success">
                <data-table example="1">
                    {{ drawHeader('ID', 'Fecha', 'Cliente', 'Motivo', 'Observaciones') }}

                    <template slot="body">
                        @foreach($binnacles as $binnacle)
                            <tr>
                                <td>{{ $binnacle->id }}</td>
                                <td>{{ fdate($binnacle->date, 'd/m/Y', 'Y-m-d') }}</td>
                                <td>{{ $binnacle->client->business }}</td>
                                <td>{{ $binnacle->reason }}</td>
                                <td>{{ $binnacle->observations }}</td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </solid-box>
        </div>
    </div>
@endsection
