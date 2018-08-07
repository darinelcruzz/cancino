@extends('lte.root')

@push('pageTitle')
    Metas | Agregar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <color-box title="Agregar metas" color="success" solid>
                {!! Form::open(['method' => 'POST', 'route' => 'goals.store']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::select('store_id',
                                ['2' => 'Chiapas', '3' => 'Soconusco', '4' => 'Altos', '5' => 'Plaza'], null,
                                ['empty' => 'Seleccione una tienda', 'tpl' => 'lte/withicon'], ['icon' => 'map-pin'])
                            !!}
                        </div>
                        <div class="col-md-3">
                            {!! Field::select('month', ['1' => 'Enero', '2' => 'Febrero', '3' => 'Marzo', '4' => 'Abril',
                                '5' => 'Mayo', '6' => 'Junio', '7' => 'Julio', '8' => 'Agosto', '9' => 'Septiembre',
                                '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre'], null,
                                ['empty' => 'Mes', 'tpl' => 'lte/withicon'], ['icon' => 'map-pin'])
                            !!}
                        </div>
                        <div class="col-md-3">
                            {!! Field::select('year',
                                ['2017' => '2017', '2018' => '2018', '2019' => '2019', '2020' => '2020'], null,
                                ['empty' => 'Año', 'tpl' => 'lte/withicon'], ['icon' => 'map-pin'])
                            !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('past_sale', ['tpl' => 'lte/withicon', 'step' => '0.01'], ['icon' => 'money']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::select('past_point', ['rojo' => 'Rojo', 'negro' => 'Negro', 'estrella' => 'Estrella', 'dorada' => 'Dorada']
                                , null, ['empty' => 'Seleccione una tienda', 'tpl' => 'lte/withicon'], ['icon' => 'map-pin'])
                            !!}
                        </div>
                    </div>
                    <hr>
                    <input type="hidden" name="status" value="pendiente">
                    {!! Form::submit('Agregar', ['class' => 'btn btn-success pull-right']) !!}

                {!! Form::close() !!}
            </solid-box>
        </div>
    </div>

@endsection
