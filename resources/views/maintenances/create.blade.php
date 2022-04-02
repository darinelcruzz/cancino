@extends('lte.root')

@push('pageTitle')
    Mantenimientos | Agregar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <color-box title="Agregar un mantenimiento" color="success">
                {!! Form::open(['method' => 'POST', 'route' => 'maintenances.store']) !!}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Field::select('type', ['programado' => 'Programado', 'correctivo' => 'Correctivo'],
                                        null, ['empty' => 'Seleccione tipo de mantenimiento', 'tpl' => 'lte/withicon'], ['icon' => 'screwdriver']) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Field::date('maintenance_at', Date::now(), ['tpl' => 'lte/withicon'], ['icon' => 'calendar-alt']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Field::select('provider_id', $providers, null, ['empty' => 'Seleccione el proveedor', 'tpl' => 'lte/withicon'], ['icon' => 'store']) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Field::number('cost', ['tpl' => 'lte/withicon'], ['icon' => 'dollar']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    {!! Field::text('observations', ['tpl' => 'lte/withicon'], ['icon' => 'edit']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <input type="hidden" name="equipment_id" value="{{ $equipment->id }}">
                    {!! Form::submit('Agregar', ['class' => 'btn btn-success btn-block']) !!}

                {!! Form::close() !!}
            </color-box>

        </div>
    </div>

@endsection
