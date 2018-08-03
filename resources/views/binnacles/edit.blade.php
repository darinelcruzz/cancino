@extends('lte.root')

@push('pageTitle')
    Bitácora | Agregar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <color-box title="Convertir a actividad ID {{ $binnacle->id }}" color="success" solid>
                {!! Form::open(['method' => 'POST', 'route' => 'binnacles.update', 'enctype' => 'multipart/form-data']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            <h3>{{ $binnacle->client->business }}</h3>
                            <h4>{{ $binnacle->method }}</h4>
                        </div>
                        <div class="col-md-6">
                            <div id="field_date" class="form-group">
                                <label for="date" class="control-label">
                                    Fecha y hora:
                                </label>
                                <div class="controls">
                                    <input class="form-control" id="date" name="date" type="datetime-local" value="{{  date('Y-m-d\TH:i', strtotime($binnacle->date)) }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::select('reason',
                                ['cotizacion' => 'Cotización', 'venta' => 'Venta', 'entrega' => 'Entrega', 'saludo' => 'Saludo',
                                'sin respuesta' => 'Sin respuesta', 'otro' => 'Otro'], NULL,
                                ['empty' => 'Selecciona el motivo', 'tpl' => 'lte/withicon', 'v-model' => 'binnacle_reason'], ['icon' => 'check'])
                            !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            {!! Field::text('observations', ['tpl' => 'lte/withicon'], ['icon' => 'eye']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <span v-if="binnacle_reason == 'cotizacion' || binnacle_reason == 'venta'" style="align-content: center;">
                            <div class="col-md-6">
                                <br>
                                <file-upload fname="document" ext="pdf" color="success"></file-upload>
                            </div>
                            <div class="col-md-6">
                                {!! Field::number('amount', ['tpl' => 'lte/withicon'], ['icon' => 'money']) !!}
                            </div>
                        </span>
                    </div>
                    <hr>
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="id" value="{{ $binnacle->id }}">
                    <input type="hidden" name="status" value="realizada">
                    {!! Form::submit('Completar', ['class' => 'btn btn-success pull-right']) !!}

                {!! Form::close() !!}
            </solid-box>
        </div>
    </div>

@endsection
