@extends('lte.root')

@push('pageTitle')
    Empleados | Detalles
@endpush

@section('content')

<div class="row">
    <div class="col-md-4">
        <div class="box box-{{ $employer->store->color }}">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="{{ Storage::url('employers/' . $employer->id . '/FOTO.jpeg') }}" alt="User profile picture">
                <h3 class="profile-username text-center">{{ $employer->name }}</h3>
                <p class="text-muted text-center">{{ $employer->store->name . ' - ' . $employer->job }}</p>

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>Ingreso</b> <a class="pull-right">{{ fdate($employer->ingress, 'd/M/y', 'Y-m-d') }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Cumpeaños</b> <a class="pull-right">{{ fdate($employer->birthday, 'd/M/y', 'Y-m-d') }}</a>
                    </li>
                    <div class="col-md-6">

                    </div>
                    <li class="list-group-item">
                        <b>Hijos</b> <a class="pull-right">{{ $employer->sons }}</a><br>
                    </li>
                    <li class="list-group-item">
                        <b>Casado</b> <a class="pull-right">{{ $employer->married ? 'Si' : 'No' }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <color-box title="{{ $employer->status }}" color="{{ $employer->store->color }}">
            @if ($employer->status == 'evaluacion uno')


                @if (auth()->user()->level < 4)
                    <a href="{{ route('employers.updateStatus', [$employer->id, 'segunda capacitacion']) }}" class="btn btn-{{ $employer->store->color }} btn-xs"><i class="fa fa-user-check"></i>&nbsp;&nbsp;Autorizar</a>
                @endif
            @elseif ($employer->status == 'evaluacion dos')


                @if (auth()->user()->level < 4)
                    <a href="{{ route('employers.updateStatus', [$employer->id, 'tercera capacitacion']) }}" class="btn btn-{{ $employer->store->color }} btn-xs"><i class="fa fa-user-check"></i>&nbsp;&nbsp;Autorizar</a>
                @endif
            @elseif ($employer->status == 'evaluacion tres')


                @if (auth()->user()->level < 4)
                    <a href="{{ route('employers.updateStatus', [$employer->id, 'activo']) }}" class="btn btn-{{ $employer->store->color }} btn-xs"><i class="fa fa-user-check"></i>&nbsp;&nbsp;Empieza a comisionar</a>
                @endif
            @endif
        </color-box>
    </div>
</div>

@endsection
