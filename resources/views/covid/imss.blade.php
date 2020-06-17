@extends('lte.root')
@push('pageTitle')
    Curso IMSS | Lista
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
                                        @if(Storage::disk('public')->exists('employers/' . $employee->id . '/FOTO.jpeg'))
                                            <img src="{{ $employee->photo }}"
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
                                <td>{!! $employee->imss ? '<span class="label label-success">terminado</span>' : '<span class="label label-danger">pendiente</span>' !!}</td>
                                <td>
                                    <dropdown icon="cogs" color="{{ auth()->user()->store->color }}">
                                        <ddi to="{{ route('employers.show', $employee) }}" icon="check" text="Curso terminado"></ddi>
                                    </dropdown>
                                </td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </solid-box>
        </div>
    </div>
@endsection
