@extends('lte.root')

@push('pageTitle', 'Terminales')

@section('content')

    <div class="row">
        <div class="col-md-3">
            @include('templates/month_select', ['route' => 'admin.terminals', 'date' => $date])
        </div>
    </div><br>

    <div class="row">

        @foreach(['chiapas', 'soconusco', 'altos', 'gale_tux', 'gale_tapa'] as $store_name)
        
        <div class="col-md-6">
            <color-box title="{{ ucwords(str_replace('_', ' ', $store_name)) }}" 
                color="{{ $loop->index < 3 ? 'primary': 'danger' }}">
                
                <div>{!! $$store_name->container() !!}</div>

            </color-box>
        </div>

        @endforeach

    </div>
@endsection

@section('chart')
    {!! $chiapas->script() !!}
    {!! $soconusco->script() !!}
    {!! $altos->script() !!}
    {!! $gale_tux->script() !!}
    {!! $gale_tapa->script() !!}
@endsection
