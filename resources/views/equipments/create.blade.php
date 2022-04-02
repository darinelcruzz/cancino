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
                                        ['CPU' => 'CPU', 'Clima' => 'Clima', 'Extintor' => 'Extintor', 'Monitor' => 'Monitor', 'Carro' => 'Carro'],
                                        null, ['empty' => 'Seleccione tipo de equipo', 'tpl' => 'lte/withicon'], ['icon' => 'screwdriver'])
                                    !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Field::text('brand', ['tpl' => 'lte/withicon'], ['icon' => 'copyright']) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Field::select('store_id', $allStoresArray, null, ['empty' => 'Seleccione la tienda', 'tpl' => 'lte/withicon'], ['icon' => 'store']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Field::date('bought_at', Date::now(),['tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Field::number('cost', ['tpl' => 'lte/withicon'], ['icon' => 'dollar']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    {!! Field::number('months', ['tpl' => 'lte/withicon', 'label' => 'Mantenimeinto (meses)'], ['icon' => 'calendar-alt']) !!}
                                </div>
                                <div class="col-md-8">
                                    {!! Field::text('observations', ['tpl' => 'lte/withicon'], ['icon' => 'edit']) !!}
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
