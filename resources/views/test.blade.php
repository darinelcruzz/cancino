@extends('lte.root')
@push('pageTitle')
    Prueba
@endpush

@section('content')

    <div class="row">
        <div class="col-md-12">
            <color-box title="Prueba" color="success">
                <div>
                    {!! $chart->container() !!}
                </div>
            </color-box>
        </div>
    </div>
{{ $salesSum }}<br>
{{ $black }}
@endsection

@section('chart')
    {!! $chart->script() !!}
@endsection
