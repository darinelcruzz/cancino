@extends('lte.root')

@push('pageTitle', 'Empleados | Detalles')

@section('content')

<div class="row">
    <div class="col-md-4">
        <div class="box box-{{ $employer->store->color }}">
            <div class="box-body box-profile">
                <p class="text-center">
                    <img v-img width="100px;" height="100px" style="border-radius: 50%;"
                        src="{{ Storage::url('employers/' . $employer->id . '/FOTO.jpeg') }}"
                        alt="User profile picture">
                </p>
                <h3 class="profile-username text-center">{{ $employer->name }}</h3>
                <p class="text-muted text-center">{{ $employer->store->name . ' - ' . $employer->job }}</p>

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>Ingreso</b> <a class="pull-right">{{ fdate($employer->ingress, 'd/M/y', 'Y-m-d') }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Cumpeaños</b> <a class="pull-right">{{ fdate($employer->birthday, 'd M', 'Y-m-d') }}</a>
                    </li>
                    <div class="col-md-6">

                    </div>
                    <li class="list-group-item">
                        <b>Hijos</b> <a class="pull-right">{{ $employer->sons }}</a><br>
                    </li>
                    <li class="list-group-item">
                        <b>Casado</b> <a class="pull-right">{{ $employer->married ? 'Si' : 'No' }}</a>
                    </li>
                    @if(isAdmin())
                    <li class="list-group-item">
                        <b>Salario</b> <a class="pull-right">$ {{ number_format($employer->salary, 2) }}</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <color-box title="{{ ucfirst($employer->status) }}" color="{{ $employer->store->color }}">

        @switch($employer->status)

            @case('primera capacitacion' || 'evaluacion uno')
                <ul>
                    <li>Curso SC</li>
                    <li>Curso atención a clientes</li>
                    <li>Curso garantías</li>
                </ul>
                @break

            @case('segunda capacitacion' || 'evaluacion dos')
                <ul>
                    <li>Curso SC *</li>
                    <li>Curso atención a clientes</li>
                    <li>Curso garantías</li>
                </ul>
                @break

            @default
                <ul>
                    <li>Curso SC</li>
                    <li>Curso atención a clientes</li>
                    <li>Curso garantías</li>
                </ul>

        @endswitch

        @if (auth()->user()->level < 4)
            {!! Form::open(['method' => 'POST', 'route' => ['employers.update', $employer]]) !!}

                @php
                    $values = ['evaluacion uno' => 'segunda capacitacion', 'evaluacion dos' => 'tercera capacitacion', 'evaluacion tres' => 'primer año'];
                @endphp


                @if($employer->status == 'evaluacion uno' || $employer->status == 'evaluacion dos' || $employer->status == 'evaluacion tres')
                    @if ($employer->status == 'evaluacion tres')
                        <input type="hidden" name="commision" value="1">
                    @endif
                    <input type="hidden" name="status" value="{{ $values[$employer->status] }}">
                    {!! Form::submit('Autorizar', ['class' => 'btn btn-' . $employer->store->color . ' btn-xs']) !!}
                @endif

            {!! Form::close() !!}
        @endif

        </color-box>

        <a href="{{ route('employers.index') }}" class="btn btn-primary btn-sm btn-block"><i class="fa fa-backward"></i>&nbsp;&nbsp;REGRESAR</a>
    </div>
</div>

@endsection
