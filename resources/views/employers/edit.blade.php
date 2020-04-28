@extends('lte.root')

@push('pageTitle')
    Empleados | Editar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Agregar un empleado" color="success">
                {!! Form::open(['method' => 'POST', 'route' => ['employers.update', $employer], 'enctype' => 'multipart/form-data']) !!}
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Field::text('name', $employer->name, ['tpl' => 'lte/withicon'], ['icon' => 'user']) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Field::date('birthday', $employer->birthday, ['tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Field::text('address', $employer->address, ['tpl' => 'lte/withicon'], ['icon' => 'map-pin']) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Field::date('ingress', $employer->ingress, ['tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Field::select('married', ['1' => 'Si', '0' => 'No'], $employer->married, ['empty' => 'Seleccione el estado civil', 'tpl' => 'lte/withicon'], ['icon' => 'ring']) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Field::number('sons', $employer->sons, ['tpl' => 'lte/withicon', 'min' => '0'], ['icon' => 'baby']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    {!!
                                        Field::select('job',
                                        ['Supervisor' => 'Supervisor', 'Gerente' => 'Gerente', 'Vendedor' => 'Ventas',
                                        'B2B' => 'B2B', 'Bodega' => 'Bodega', 'Apoyo' => 'Apoyo'],
                                        $employer->job, ['empty' => 'Seleccione el puesto', 'tpl' => 'lte/withicon'], ['icon' => 'bezier-curve'])
                                    !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Field::select('store_id', $storesArray, $employer->store_id, ['empty' => 'Seleccione la tienda', 'tpl' => 'lte/withicon'], ['icon' => 'store']) !!}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    {!! Field::text('account_number', $employer->account_number, ['tpl' => 'lte/withicon'], ['icon' => 'id-card-alt']) !!}
                                </div>
                                @if(auth()->user()->store_id == 1)
                                    <div class="col-md-6">
                                        {!! Field::number('salary', $employer->salary, ['tpl' => 'lte/withicon', 'step' => '0.01', 'min' => '0'], ['icon' => 'usd']) !!}
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                    <hr>
                    {!! Form::submit('GUARDAR CAMBIOS', ['class' => 'btn btn-success btn-block']) !!}

                {!! Form::close() !!}
            </color-box>

        </div>
    </div>

@endsection
