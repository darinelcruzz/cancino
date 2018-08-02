@extends('lte.root')
@push('pageTitle')
    Clientes | Detalles
@endpush

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $client->business }}</h3>
                <br><br>
            </div>
            <div class="icon">
                <i class="fa fa-user"></i>
            </div>
        </div>
    </div>
</div>
@endsection
