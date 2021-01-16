@extends('lte.root')

@push('pageTitle')
    Empleados | Agregar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Agregar un empleado" color="success">
                {!! Form::open(['method' => 'POST', 'route' => 'employers.store', 'enctype' => 'multipart/form-data']) !!}
                    <div class="row">
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
                            
                            @if(auth()->user()->store_id == 1)
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
                                        {!! Field::select('store_id', $allStoresArray, null, ['empty' => 'Seleccione la tienda', 'tpl' => 'lte/withicon'], ['icon' => 'store']) !!}
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-md-6">
                                        {!!
                                            Field::select('job', ['Vendedor' => 'Ventas', 'Bodega' => 'Bodega', 'Apoyo' => 'Apoyo'],
                                            null, ['empty' => 'Seleccione el puesto', 'tpl' => 'lte/withicon'], ['icon' => 'bezier-curve'])
                                        !!}
                                    </div>
                                    <div class="col-md-6">
                                        <input type="hidden" name="store_id" value="{{ auth()->user()->store_id }}">
                                    </div>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-md-6">
                                    {!! Field::text('account_number', ['tpl' => 'lte/withicon'], ['icon' => 'id-card-alt']) !!}
                                </div>

                                @if(auth()->user()->store_id == 1)
                                    <div class="col-md-6">
                                        {!! Field::number('salary', $salary, ['tpl' => 'lte/withicon', 'step' => '0.01', 'min' => $salary], ['icon' => 'usd']) !!}
                                    </div>
                                @else
                                    <input type="hidden" name="salary" value="{{ $salary }}">
                                @endif
                            </div>
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
                    {{-- {!! Form::submit('Agregar', ['class' => 'btn btn-success btn-block']) !!} --}}

                    <button type="submit" class='btn btn-success btn-block' onclick="submitForm(this);">AGREGAR</button>

                {!! Form::close() !!}
            </color-box>

        </div>
    </div>

@endsection
