@extends('lte.root')

@push('pageTitle')
    Empleados | Detalles
@endpush

@section('content')

<div class="row">
    <div class="col-md-3">
        <div class="box box-{{ auth()->user()->store->color }}">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="/storage/employers/{{ $employer->id }}/photo.png" alt="User profile picture">
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
    <div class="col-md-9">
        <color-box title="Detalles" color="{{ auth()->user()->store->color }}">
            <div class="row">
                <div class="col-md-6">
                    <h4><b>Habilidades</b></h4>
                    <p>{{ $employer->skills }}</p>
                </div>
                <div class="col-md-6">
                    <h4><b>Debilidades</b></h4>
                    <p>{{ $employer->weaknesses }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
