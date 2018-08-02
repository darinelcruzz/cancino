@extends('lte.root')
@push('pageTitle')
    Bitácora | Lista
@endpush

@push('headerTitle')
    <a href="{{ route('binnacles.activity') }}" class="btn btn-success"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Actividad</a>
    <a href="{{ route('binnacles.planning') }}" class="btn btn-warning"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Planeación</a>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Actividades" color="success" button collapsed>
                <data-table example="1">
                    {{ drawHeader('ID', 'Fecha', 'Cliente', 'Motivo', 'Observaciones') }}

                    <template slot="body">
                        @foreach($activitys as $activity)
                            <tr>
                                <td>{{ $activity->id }}</td>
                                <td>{{ fdate($activity->date, 'd/m/Y') }} <br> {{ fdate($activity->date, 'h:i a') }}</td>
                                <td><a href="{{ route('clients.show', ['id' => $activity->client->id]) }}">{{ $activity->client->business }} </a></td>
                                <td>
                                    {{ $activity->reason }}
                                    @if($activity->document)
                                        &nbsp;&nbsp;&nbsp;
                                        <modal id="pdf{{ $activity->id }}" title="PDF">
                                            <iframe src="{{ Storage::url($activity->document) }}#view=FitH" width="100%" height="600"></iframe>
                                        </modal>
                                        <modal-button target="pdf{{ $activity->id }}">
                                            <a style="color: red;" title="FACTURA"><i class="fa fa-file-pdf-o"></i></a>
                                        </modal-button>
                                        <br>
                                        {{ fnumber($activity->amount) }}
                                    @endif
                                </td>
                                <td>{{ $activity->observations }}</td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </solid-box>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <color-box title="Planeación" label="{{ count($plannings) }}" color="warning" button collapsed>
                <data-table example="1">
                    {{ drawHeader('ID', 'Fecha', 'Cliente', 'Motivo', 'Notas', '') }}

                    <template slot="body">
                        @foreach($plannings as $planning)
                            <tr>
                                <td>{{ $planning->id }}</td>
                                <td>{{ fdate($activity->date, 'd/m/Y') }} <br> {{ fdate($activity->date, 'h:i a') }}</td>
                                <td><a href="{{ route('clients.show', ['id' => $planning->client->id]) }}">{{ $planning->client->business }} </a></td>
                                <td>{{ $planning->reason }}</td>
                                <td>{{ $planning->notes }}</td>
                                <td><a href="{{ route('binnacles.edit', ['id' => $planning->id])}}" class="btn btn-xs btn-success"><i class="fa fa-check"></i></a></td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </solid-box>
        </div>
    </div>
@endsection
