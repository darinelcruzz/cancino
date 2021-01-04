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
                            {!! Field::select('month', ['1' => 'Enero', '2' => 'Febrero', '3' => 'Marzo', '4' => 'Abril',
                                '5' => 'Mayo', '6' => 'Junio', '7' => 'Julio', '8' => 'Agosto', '9' => 'Septiembre',
                                '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre'], null,
                                ['empty' => 'Mes', 'tpl' => 'lte/withicon'], ['icon' => 'calendar'])
                            !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::select('year',
                                ['2021' => '2021', '2022' => '2022', '2023' => '2023', '2024' => '2024'], null,
                                ['empty' => 'Año', 'tpl' => 'lte/withicon'], ['icon' => 'calendar'])
                            !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('daysshop', ['tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('daysprofessional', ['tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                        </div>
                    </div>
                    <hr>
                    {!! Form::submit('Agregar', ['class' => 'btn btn-success pull-right']) !!}

                {!! Form::close() !!}
            </solid-box>
        </div>
    </div>

@endsection
