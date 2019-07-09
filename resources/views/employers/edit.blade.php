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
                                    {!! Field::select('store_id', $stores, $employer->store_id, ['empty' => 'Seleccione la tienda', 'tpl' => 'lte/withicon'], ['icon' => 'store']) !!}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    {!! Field::text('account_number', $employer->account_number, ['tpl' => 'lte/withicon'], ['icon' => 'id-card-alt']) !!}
                                </div>
                            </div>

                            @if (auth()->user()->level < 4)
                                <div class="row">
                                    <div class="col-md-6">
                                        {!! Field::textarea('skills', $employer->skills, ['tpl' => 'lte/withicon', 'rows' => '3'], ['icon' => 'smile-wink']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        {!! Field::textarea('weaknesses', $employer->weaknesses, ['tpl' => 'lte/withicon', 'rows' => '3'], ['icon' => 'skull']) !!}
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <b>Archivos</b>
                                <br>
                                <div class="col-md-12" align="center">
                                    <fu-button fname="ine" color="primary" ext="application/pdf" bname="INE"></fu-button>
                                </div>
                                <br><br><br>
                            </div>

                            <div class="row">
                                <div class="col-md-12" align="center">
                                    <fu-button fname="curp" color="primary" ext="application/pdf" bname="CURP"></fu-button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12" align="center">
                                    <fu-button fname="address_file" color="primary" ext="application/pdf" bname="COMP. DOM"></fu-button>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12" align="center">
                                    <fu-button fname="birth_certificate" color="primary" ext="application/pdf" bname="ACTA"></fu-button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12" align="center">
                                    <fu-button fname="social_security_number" color="primary" ext="application/pdf" bname="NUM. SEG. SOCIAL"></fu-button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12" align="center">
                                    <fu-button fname="photo" color="primary" ext="image/*" bname="FOTO"></fu-button>
                                </div>
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
