@extends('lte.simple')

@push('pageTitle')
    Mantenimientos | Detalles
@endpush

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Equipo {{ $maintenance->name }}</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <strong><i class="fa fa-map-marker margin-r-5"></i> Ubicación</strong>
                            <p class="text-muted">{{ $maintenance->store->name }}</p>
                            <hr>
                            <strong><i class="fa fa-book margin-r-5"></i> Equipo</strong>
                            <p class="text-muted">{{ $maintenance->equipment }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong><i class="fa fa-medkit margin-r-5"></i> Observaciones</strong>
                            <p class="text-muted">{{ $maintenance->observations }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <strong><i class="fa fa-screwdriver margin-r-5"></i> Mantenimiento anterior</strong>
                                    <p class="text-muted">{{ fdate($maintenance->maintenance_at, 'd/M/y', 'Y-m-d') }}</p>
                                    <p class="text-muted">Por: {{ $maintenance->provider }}</p>
                                    <p class="text-muted">Tipo: {{ $maintenance->type }}</p>
                                </div>
                                <div class="col-md-6">
                                    <strong><i class="fa fa-screwdriver margin-r-5"></i> Siguiente</strong>
                                    <p class="text-muted">{{ fdate($maintenance->maintenance_at, 'd/M/y', 'Y-m-d') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('maintenances.show', ['id' => $maintenance->id])}}" class="btn btn-success btn-block"><i class="fa fa-edit"> Editar</i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
