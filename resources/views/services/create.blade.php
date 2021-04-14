@extends('lte.root')

@push('pageTitle', 'Servicios | Agregar')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <color-box title="Agregar nuevo servicio" color="vks" solid>
                {!! Form::open(['method' => 'POST', 'route' => 'services.store']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::text('description', ['tpl' => 'lte/withicon'], ['icon' => 'comments']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::select('group', ['telefono' => 'Teléfono', 'luz' => 'Luz', 'agua' => 'Agua', 'seguro' => 'Seguro', 'basura' => 'Basura', 'predial' => 'Predial'], null,
                                ['empty' => 'Seleccione un grupo', 'tpl' => 'lte/withicon'], ['icon' => 'group'])
                            !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('amount', ['tpl' => 'lte/withicon', 'step' => '0.01'], ['icon' => 'money']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::date('invoiced_at', date('Y-m-d'), ['label' => 'Fecha facturación', 'tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('period', 1, ['label' => '¿Cada cuántos meses?', 'tpl' => 'lte/withicon', 'min' => '1'], ['icon' => 'sync-alt']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::date('expired_at', date('Y-m-d'), ['label' => 'Fecha vencimiento', 'tpl' => 'lte/withicon'], ['icon' => 'calendar-alt']) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::select('store_id', ['Tiendas' => $stores->toArray(), 'Casas' => $homes->toArray()], null,
                                ['label' => 'Corresponde a', 'empty' => 'Seleccione una opción', 'tpl' => 'lte/withicon'], ['icon' => 'store'])
                            !!}
                        </div>
                    </div>

                    <hr>

                    {!! Form::submit('Agregar', ['class' => 'btn btn-github pull-right']) !!}

                {!! Form::close() !!}
            </solid-box>
        </div>
    </div>

@endsection
