@extends('lte.root')

@push('pageTitle')
    Bitácora | Agregar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <color-box title="Agregar actividad" color="success" solid>
                {!! Form::open(['method' => 'POST', 'route' => 'binnacles.store']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::select('client_id', $clients, null, ['empty' => 'Seleccione el cliente']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::date('date', date('Y-m-d'), ['empty' => 'Seleccione el cliente']) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            {!! Field::select('reason',
                                ['llamada' => 'Llamada', 'visita' => 'Visita', 'cotizacion' => 'Cotización',
                                'venta' => 'Venta', 'entrega' => 'Entrega'], null,
                                ['empty' => 'Selecciona el motivo', 'tpl' => 'lte/withicon'], ['icon' => 'check'])
                            !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {!! Field::text('observations', ['tpl' => 'lte/withicon'], ['icon' => 'eye']) !!}
                        </div>
                    </div>

                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    {!! Form::submit('Agregar', ['class' => 'btn btn-success pull-right']) !!}

                {!! Form::close() !!}
            </solid-box>
        </div>
    </div>

@endsection
