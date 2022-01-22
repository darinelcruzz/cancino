@extends('lte.root')

@push('pageTitle', 'Servicios | Editar')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <color-box title="Editar servicio" color="vks" solid>
                {!! Form::open(['method' => 'POST', 'route' => ['services.update', $service]]) !!}

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::text('description', $service->description, ['tpl' => 'lte/withicon'], ['icon' => 'comments']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::select('group', ['telefono' => 'Teléfono', 'luz' => 'Luz', 'agua' => 'Agua', 'seguro' => 'Seguro Automovil',
                                'basura' => 'Basura', 'predial' => 'Predial', 'co2' => 'CO2', 'impuestos' => 'Impuestos', 'contabilidad' => 'Contabilidad',
                                'fumigacion' => 'Fumigación', 'isn' => 'ISN', 'digibox' => 'Digibox', 'renta' => 'Renta'], $service->group,
                                ['empty' => 'Seleccione un grupo', 'tpl' => 'lte/withicon'], ['icon' => 'group'])
                            !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('amount', $service->amount, ['tpl' => 'lte/withicon', 'step' => '0.01'], ['icon' => 'money']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::date('invoiced_at', $service->invoiced_at, ['label' => 'Fecha facturación', 'tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('period', 1, ['label' => '¿Cada cuántos meses?', 'tpl' => 'lte/withicon', 'min' => '1'], ['icon' => 'sync-alt']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::date('expired_at', $service->expired_at, ['label' => 'Fecha vencimiento', 'tpl' => 'lte/withicon'], ['icon' => 'calendar-alt']) !!}
                        </div>
                    </div>

                    <hr>

                    {!! Form::submit('E D I T A R', ['class' => 'btn btn-github pull-right']) !!}

                {!! Form::close() !!}
            </solid-box>
        </div>
    </div>

@endsection
