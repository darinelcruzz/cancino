@extends('lte.root')

@push('pageTitle', 'Ventas | Lista')

@section('content')

    <div class="row">
        <div class="col-md-3">
            @include('templates/month_select', ['route' => 'admin.public', 'date' => $date])
        </div>
    </div><br>

    <div class="row">
        <div class="col-md-12">

            @foreach(['chiapas', 'soconusco', 'altos', 'gale_tux', 'gale_tapa'] as $store_name)
                
                <color-box title="Ventas {{ ucwords(str_replace('_', ' ', $store_name)) }}" 
                    color="{{ $loop->index < 3 ? 'primary': 'danger' }}">
                    
                    <div>{!! $$store_name->container() !!}</div>

                    @include('templates/progress', ['num' => $loop->index + 2])

                </color-box>

            @endforeach

        </div>
    </div>
@endsection

@section('chart')
    {!! $chiapas->script() !!}
    {!! $soconusco->script() !!}
    {!! $altos->script() !!}
    {!! $gale_tux->script() !!}
    {!! $gale_tapa->script() !!}
@endsection
