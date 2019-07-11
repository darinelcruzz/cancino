@extends('lte.root')

@push('pageTitle')
    Empleados | Agregar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <color-box title="Agregar un equipo" color="success">
                {!! Form::open(['method' => 'POST', 'route' => 'equipments.store']) !!}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Field::text('name', ['tpl' => 'lte/withicon'], ['icon' => 'barcode']) !!}
                                </div>
                                <div class="col-md-6">
                                    {!!
                                        Field::select('type',
                                        ['CPU' => 'CPU', 'Clima' => 'Clima', 'Extintor' => 'Extintor', 'Monitor' => 'Monitor'],
                                        null, ['empty' => 'Seleccione tipo de equipo', 'tpl' => 'lte/withicon'], ['icon' => 'screwdriver'])
                                    !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Field::text('brand', ['tpl' => 'lte/withicon'], ['icon' => 'copyright']) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Field::select('store_id', $stores, null, ['empty' => 'Seleccione la tienda', 'tpl' => 'lte/withicon'], ['icon' => 'store']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Field::number('months', ['tpl' => 'lte/withicon'], ['icon' => 'calendar-alt']) !!}
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
