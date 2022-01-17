@extends('lte.root')

@push('pageTitle', 'Empleados | Lista')

@push('headerTitle')
    <a href="{{ route('employers.create') }}" class="btn btn-github btn-xs"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Agregar</a>
@endpush

@section('content')
    <div class="row">
        @foreach($stores as $store)
            <div class="col-md-12">
                <color-box title="Empleados de {{ $store->first()->store->name }}" label="{{ count($store) }}" color="{{ $store->first()->store->color }}" button collapsed>
                    <table class="table table-striped table-bordered spanish">
                        <thead>
                            <tr>
                                <th style="width: 5%; text-align: center;"><i class="fa fa-photo"></i></th>
                                <th style="width: 5%; text-align: center;"><i class="fa fa-cogs"></i></th>
                                <th><small>NOMBRE</small></th>
                                <th><small>PUESTO</small></th>
                                <th style="width: 3%; text-align: center;"><small>EDAD</small></th>
                                <th style="width: 10%; text-align: right;"><small>CUMPLEAÑOS</small></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($store as $employee)
                                <tr>
                                    <td>
                                        <div class="col-md-2">
                                            <img src="{{ $employee->photo }}"
                                                alt="foto de {{ $employee->name }}"
                                                width="30px" height="30px"
                                                style="border-radius: 50%;">
                                        </div>
                                    </td>
                                    <td>
                                        <dropdown icon="cogs" color="{{ $employee->store->id == 1 ? 'github': $employee->store->color }}">
                                            <ddi to="{{ route('employers.show', $employee) }}" icon="eye" text="Detalles"></ddi>
                                            <ddi to="{{ route('employers.explore', $employee) }}" icon="file-pdf" text="Documentos"></ddi>
                                            <ddi to="{{ route('employers.edit', $employee) }}" icon="edit" text="Editar"></ddi>
                                            <ddi to="#" data-toggle="modal" data-target="#employee{{ $employee->id }}" icon="times" text="Dar de baja"></ddi>
                                        </dropdown>

                                        {!! Form::open(['method' => 'POST', 'route' => ['employers.dismiss', $employee], 'enctype' => 'multipart/form-data']) !!}
                                            <modal id="employee{{ $employee->id }}" title="Dar de baja a {{ $employee->name }}">

                                                <div class="row">
                                                    <div class="col-md-12" align="center">
                                                        <b>Carta renuncia (opcional)</b>
                                                        <br>
                                                        <fu-button fname="resignation" color="primary" ext="application/pdf" bname="RENUNCIA"></fu-button>
                                                        <input type="hidden" name="status" value="inactivo">
                                                    </div>
                                                </div>

                                                <template slot="footer">
                                                    {!! Form::submit('Dar de baja', ['class' => 'btn btn-sm btn-danger pull-right']) !!}
                                                </template>
                                                
                                            </modal>
                                        {!! Form::close() !!}
                                    </td>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->job }}</td>
                                    <td style="text-align: center;">{{ $employee->age }}</td>
                                    <td style="text-align: right;">{{ strtoupper(fdate($employee->birthday, 'd F', 'Y-m-d')) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </color-box>
            </div>
        @endforeach
        <div class="col-md-12">
            <color-box title="Empleados en capacitación" label="{{ count($training) }}" color="warning" button collapsed>
                <data-table example="10">
                    {{ drawHeader('nombre', 'tienda', 'estado', '<i class="fa fa-cogs"></i>') }}
                    <template slot="body">
                        @foreach ($training as $employee)
                            <tr>
                                <td>
                                    <div class="col-md-2">
                                        <img src="{{ $employee->photo }}"
                                        alt="foto de {{ $employee->name }}"
                                        width="50px" height="50px"
                                        style="border-radius: 50%;">
                                    </div>
                                    <div class="col-md-4">
                                        {{ $employee->name }} <br>
                                        <code>{{ $employee->job }}</code>
                                    </div>
                                </td>
                                <td>{{ $employee->store->name }}</td>
                                <td>{{ $employee->status }}</td>
                                <td>
                                    <dropdown icon="cogs" color="warning">
                                        <ddi to="{{ route('employers.show', $employee) }}" icon="eye" text="Detalles"></ddi>
                                    </dropdown>
                                </td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>

        @foreach($departments as $department => $employees)
            <div class="col-lg-3 col-md-4">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h4><b>{{ ucfirst(pluralize($department, $department != 'B2B')) }}</b></h4>
                        <h3 align="center"><b>{{ count($employees) }}</b></h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="col-lg-3 col-md-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h4><b>Total</b></h4>
                    <h3 align="center"><b>{{ $departments->sum(function ($item) { return collect($item)->count();}) }}</b></h3>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <color-box title="Empleados dados de baja" label="{{ count($inactive) }}" color="default" button collapsed>
                <data-table example="10">
                    {{ drawHeader('<i class="fa fa-photo"></i>', '<i class="fa fa-cogs"></i>', 'nombre', 'puesto', 'tienda') }}
                    <template slot="body">
                        @foreach ($inactive as $employee)
                            <tr>
                                <td style="width: 5%">
                                    @if(Storage::disk('public')->exists('employees/' . $employee->id . '/FOTO.jpeg'))
                                        <img src="{{ Storage::url('employees/' . $employee->id . '/FOTO.jpeg') }}"
                                        alt="foto de {{ $employee->name }}"
                                        width="40px" height="40px"
                                        style="border-radius: 50%;">
                                    @else
                                        <img src="{{ asset('images/default-avatar.png') }}"
                                        width="40px" height="40px"
                                        style="border-radius: 50%;">
                                    @endif
                                </td>
                                <td style="width: 5%">
                                    <dropdown icon="cogs" color="default">
                                        <ddi to="{{ route('employers.show', $employee) }}" icon="eye" text="Detalles"></ddi>
                                        <ddi to="#" data-toggle="modal" data-target="#employee{{ $employee->id }}" icon="arrow-circle-up" text="Dar de alta"></ddi>
                                    </dropdown>
                                    
                                    {!! Form::open(['method' => 'POST', 'route' => ['employers.restore', $employee]]) !!}
                                    <modal id="employee{{ $employee->id }}" title="Dar de alta a {{ $employee->name }}">

                                        {!! Field::select('store_id', $storesArray, null, ['empty' => 'Seleccione la tienda', 'tpl' => 'lte/withicon'], ['icon' => 'store']) !!}

                                        <input type="hidden" name="status" value="primera capacitacion">

                                        <template slot="footer">
                                            {!! Form::submit('Dar de alta', ['class' => 'btn btn-sm btn-success pull-right']) !!}
                                        </template>
                                        
                                    </modal>
                                    {!! Form::close() !!}
                                </td>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->job }}</td>
                                <td>{{ $employee->store->name }}</td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
    </div>
@endsection
