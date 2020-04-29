@extends('lte.root')
@push('pageTitle')
    Empleados | Lista
@endpush

@push('headerTitle')
    <a href="{{ route('employers.create') }}" class="btn btn-success btn-xs"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Agregar</a>
@endpush

@section('content')
    <div class="row">
        @foreach($stores as $store)
            <div class="col-md-12">
                <color-box title="Empleados de {{ $store->first()->store->name }}" label="{{ count($store) }}" color="{{ $store->first()->store->color }}" button collapsed>
                    <data-table example="{{ $store->first()->store->id }}">
                        {{ drawHeader('foto', 'nombre', 'cumpleaños', '<i class="fa fa-cogs"></i>') }}
                        <template slot="body">
                            @foreach ($store as $employee)
                                <tr>
                                    <td>
                                        <div class="col-md-2">
                                            @if(Storage::disk('public')->exists('employees/' . $employee->id . '/FOTO.jpeg'))
                                                <img src="{{ Storage::url('employees/' . $employee->id . '/FOTO.jpeg') }}"
                                                    alt="foto de {{ $employee->name }}"
                                                    width="50px" height="50px"
                                                    style="border-radius: 50%;">
                                            @else
                                                <img src="{{ asset('images/default-avatar.png') }}"
                                                    width="50px" height="50px"
                                                    style="border-radius: 50%;">
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        {{ $employee->name }} <br>
                                        <code>{{ $employee->job }}</code>
                                    </td>
                                    <td>{{ fdate($employee->birthday, 'd M Y', 'Y-m-d') }}</td>
                                    <td>
                                        <dropdown icon="cogs" color="{{ $employee->store->color }}">
                                            <ddi to="{{ route('employers.show', ['id' => $employee->id]) }}" icon="eye" text="Detalles"></ddi>
                                            <ddi to="{{ route('employers.explore', $employee) }}" icon="file-pdf" text="Documentos"></ddi>
                                            <ddi to="{{ route('employers.edit', $employee) }}" icon="edit" text="Editar"></ddi>
                                            <ddi to="{{ route('employers.dismiss', $employee) }}" icon="times" text="Dar de baja"></ddi>
                                        </dropdown>
                                    </td>
                                </tr>
                            @endforeach
                        </template>
                    </data-table>
                </solid-box>
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
                                        @if(Storage::disk('public')->exists('employees/' . $employee->id . '/FOTO.jpeg'))
                                            <img src="{{ Storage::url('employees/' . $employee->id . '/FOTO.jpeg') }}"
                                            alt="foto de {{ $employee->name }}"
                                            width="50px" height="50px"
                                            style="border-radius: 50%;">
                                        @else
                                            <img src="{{ asset('images/default-avatar.png') }}"
                                            width="50px" height="50px"
                                            style="border-radius: 50%;">
                                        @endif
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
                                        <ddi to="{{ route('employers.show', ['id' => $employee->id]) }}" icon="eye" text="Detalles"></ddi>
                                    </dropdown>
                                </td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </solid-box>
        </div>
        <div class="col-lg-3 col-md-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h4><b>Gerentes</b></h4>
                    <h3 align="center"><b>{{ count($employees->where('job', 'Gerente')) }}</b></h3>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h4><b>Vendedores</b></h4>
                    <h3 align="center"><b>{{ count($employees->where('job', 'Vendedor')) }}</b></h3>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h4><b>Apoyo y bodega</b></h4>
                    <h3 align="center"><b>{{ count($employees->where('job', 'Apoyo')) + count($employees->where('job', 'Bodega')) }}</b></h3>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h4><b>B2B</b></h4>
                    <h3 align="center"><b>{{ count($employees->where('job', 'B2B')) }}</b></h3>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h4><b>Total</b></h4>
                    <h3 align="center"><b>{{ count($employees) }}</b></h3>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
            </div>
        </div>
    </div>
@endsection
