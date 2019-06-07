@extends('lte.root')

@push('pageTitle')
    Empleados | Agregar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Agregar un empleado" color="success">
                {!! Form::open(['method' => 'POST', 'route' => 'employers.store', 'enctype' => 'multipart/form-data']) !!}
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::text('name', ['tpl' => 'lte/withicon'], ['icon' => 'user']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::date('birthday', ['tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::text('address', ['tpl' => 'lte/withicon'], ['icon' => 'map-pin']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::date('ingress', date('Y-m-d'), ['tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::select('married', ['1' => 'Si', '0' => 'No'], null, ['empty' => 'Seleccione el estado civil', 'tpl' => 'lte/withicon'], ['icon' => 'ring']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::number('sons', 0,['tpl' => 'lte/withicon', 'min' => '0'], ['icon' => 'baby']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                {!!
                                    Field::select('job',
                                    ['Supervisor' => 'Supervisor', 'Gerente' => 'Gerente', 'Vendedor' => 'Ventas',
                                    'B2B' => 'B2B', 'Bodega' => 'Bodega', 'Apoyo' => 'Apoyo'],
                                    null, ['empty' => 'Seleccione el puesto', 'tpl' => 'lte/withicon'], ['icon' => 'bezier-curve'])
                                !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::select('store_id', $stores, null, ['empty' => 'Seleccione la tienda', 'tpl' => 'lte/withicon'], ['icon' => 'store']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::textarea('skills', ['tpl' => 'lte/withicon'], ['icon' => 'smile-wink']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::textarea('weaknesses', ['tpl' => 'lte/withicon'], ['icon' => 'skull']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <h4><b>Agregar una foto</b></h4>
                            <br>
                            <div class="col-md-12" align="center">
                                <input type="file" name="photo" accept="image/*">
                            </div>
                            <br><br><br>
                        </div>
                    </div>
                    {!! Form::submit('Agregar', ['class' => 'btn btn-success btn-block']) !!}

                {!! Form::close() !!}
            </color-box>

        </div>
    </div>

@endsection
