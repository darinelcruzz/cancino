@extends('lte.root')

@push('pageTitle')
    Bitácora | Agregar planeación
@endpush

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <color-box title="Agregar planeación" color="warning" solid>
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
                            {!! Field::select('method',
                                ['visita' => 'Visita', 'llamada' => 'Llamada', 'correo' => 'Correo'], null,
                                ['empty' => 'Selecciona el motivo', 'tpl' => 'lte/withicon'], ['icon' => 'handshake-o'])
                            !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            {!! Field::text('notes', ['tpl' => 'lte/withicon'], ['icon' => 'edit']) !!}
                        </div>
                    </div>
                    <hr>
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="status" value="pendiente">
                    <button type="submit" class="btn btn-warning pull-right" onclick="submitForm(this);">Agregar</button>

                {!! Form::close() !!}
            </solid-box>
        </div>
    </div>
@endsection
