@extends('lte.root')

@push('pageTitle')
    Mantenimientos | Detalles
@endpush

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Equipo {{ $equipment->name }}</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <strong><i class="fa fa-box margin-r-5"></i> Tipo</strong>
                            <p class="text-muted">{{ $equipment->type }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong><i class="fa fa-copyright margin-r-5"></i> Marca</strong>
                            <p class="text-muted">{{ $equipment->brand }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <strong><i class="fa fa-map-marker margin-r-5"></i> Ubicación</strong>
                            <p class="text-muted">{{ $equipment->store->name }}</p>
                            <strong><i class="fa fa-medkit margin-r-5"></i> Mantenimiento</strong>
                            <p class="text-muted">{{ $equipment->months }} meses</p>
                        </div>
                        <div class="col-md-6">
                            <strong><i class="fa fa-book margin-r-5"></i> Observaciones</strong>
                            <p class="text-muted">{{ $equipment->observations }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
