@extends('lte.root')

@push('pageTitle', 'Empleados | Lista')

@push('headerTitle')
    <a href="{{ route('employers.create') }}" class="btn btn-success btn-xs"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Agregar</a>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Empleados de {{ $employers->first()->store->name }}" color="{{ $employers->first()->store->color }}">
                <data-table example="1">
                    {{ drawHeader('foto', 'nombre', 'cumpleaños', '<i class="fa fa-cogs"></i>') }}
                    <template slot="body">
                        @foreach($employers as $employee)
                            <tr>
                                <td>
                                    <div class="col-md-2">
                                        <img width="50px;" height="50px" style="border-radius: 50%;" 
                                            src="{{ Storage::url('employers/' . $employee->id . '/FOTO.jpeg') }}" 
                                            alt="User profile picture">
                                        {{-- @if(Storage::disk('public')->exists('employers/' . $employee->id . '/FOTO.jpeg'))
                                            <img src="{{ $employee->photo }}"
                                                alt="foto de {{ $employee->name }}"
                                                width="50px" height="50px"
                                                style="border-radius: 50%;">
                                        @else
                                            <img src="{{ asset('images/default-avatar.png') }}"
                                                width="50px" height="50px"
                                                style="border-radius: 50%;">
                                        @endif --}}
                                    </div>
                                </td>
                                <td>
                                    {{ $employee->name }} <br>
                                    <code>{{ $employee->job }}</code>
                                </td>
                                <td>{{ fdate($employee->birthday, 'd M Y', 'Y-m-d') }}</td>
                                <td>
                                    <dropdown icon="cogs" color="{{ auth()->user()->store->color }}">
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
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </solid-box>
        </div>
    </div>
@endsection
