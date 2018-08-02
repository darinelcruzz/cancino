@extends('lte.root')

@push('pageTitle')
    Bitácora | Agregar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <color-box title="Agregar actividad" color="success" solid>
                {!! Form::open(['method' => 'POST', 'route' => 'binnacles.store', 'enctype' => 'multipart/form-data']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::select('client_id', $clients, null, ['empty' => 'Seleccione el cliente']) !!}
                        </div>
                        <div class="col-md-6">
                            <div id="field_date" class="form-group">
                                <label for="date" class="control-label">
                                    Fecha y hora:
                                </label>
                                <div class="controls">
                                    <input class="form-control" id="date" name="date" type="datetime-local" value="{{  date('Y-m-d\TH:i') }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::select('reason',
                                ['llamada' => 'Llamada', 'visita' => 'Visita', 'cotizacion' => 'Cotización',
                                'venta' => 'Venta', 'entrega' => 'Entrega'], null,
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

                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="status" value="realizada">
                    {!! Form::submit('Agregar', ['class' => 'btn btn-success pull-right']) !!}

                {!! Form::close() !!}
            </solid-box>
        </div>
    </div>

@endsection
