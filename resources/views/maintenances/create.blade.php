@extends('lte.root')

@push('pageTitle')
    Empleados | Agregar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <color-box title="Agregar un empleado" color="success">
                {!! Form::open(['method' => 'POST', 'route' => 'maintenances.store']) !!}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Field::text('name', ['tpl' => 'lte/withicon'], ['icon' => 'barcode']) !!}
                                </div>
                                <div class="col-md-6">
                                    {!!
                                        Field::select('equipment',
                                        ['CPU' => 'CPU', 'Clima' => 'Clima', 'Extintor' => 'Extintor'],
                                        null, ['empty' => 'Seleccione tipo de equipo', 'tpl' => 'lte/withicon'], ['icon' => 'screwdriver'])
                                    !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Field::select('store_id', $stores, null, ['empty' => 'Seleccione la tienda', 'tpl' => 'lte/withicon'], ['icon' => 'store']) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Field::date('maintenance_at', date('Y-m-d'), ['tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Field::text('provider', ['tpl' => 'lte/withicon'], ['icon' => 'map-pin']) !!}
                                </div>
                                <div class="col-md-6">
                                    {!!
                                        Field::select('type',['limpieza' => 'Limpieza', 'reseteo' => 'Reseteo', 'relleno' => 'Relleno'],
                                        null, ['empty' => 'Seleccione tipo de mantenimiento', 'tpl' => 'lte/withicon'], ['icon' => 'screwdriver'])
                                    !!}
                                </div>
                                <div class="col-md-6">

                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    {!! Form::submit('Agregar', ['class' => 'btn btn-success btn-block']) !!}

                {!! Form::close() !!}
            </color-box>

        </div>
    </div>

@endsection
