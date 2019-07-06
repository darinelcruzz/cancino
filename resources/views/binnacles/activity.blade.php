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
                            {!! Field::select('client_id', $clients, null, ['empty' => 'Seleccione el cliente', 'tpl' => 'lte/withicon'], ['icon' => 'handshake-o']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::datetimelocal('date', date('Y-m-d\TH:i'), ['empty' => 'Seleccione el cliente', 'tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::select('method',
                                ['visita' => 'Visita', 'llamada' => 'Llamada', 'correo' => 'Correo'], null,
                                ['empty' => 'Selecciona el método', 'tpl' => 'lte/withicon'], ['icon' => 'envelope'])
                            !!}
                        </div>
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
                                {!! Field::number('amount', ['tpl' => 'lte/withicon', 'placeholder' => 'sin IVA', 'step' => '0.01'], ['icon' => 'money']) !!}
                            </div>
                        </span>
                    </div>
                    <hr>
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="status" value="realizada">
                    <button type="submit" class="btn btn-success pull-right" onclick="submitForm(this);">Agregar</button>

                {!! Form::close() !!}
            </solid-box>
        </div>
    </div>

@endsection
