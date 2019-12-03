@extends('lte.root')

@push('pageTitle')
    Arqueo | Terminales
@endpush

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('templates/month_select', ['route' => 'checkup.cards', 'date' => $date])
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-12">
            <color-box title="Arqueo" color="{{ auth()->user()->store->color }}">

                <div>{!! $chart->container() !!}</div>

            </color-box>

        </div>
    </div>

@endsection

@section('chart')
    {!! $chart->script() !!}
@endsection
