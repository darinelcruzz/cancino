@extends('lte.root')

@push('pageTitle', 'Ventas | Gráficas')

@section('content')

    <div class="row">
        <div class="col-md-3">
            @include('templates/month_select', ['route' => 'admin.public', 'date' => $date])
        </div>
    </div><br>

    <div class="row">
        <div class="col-md-12">

            @foreach($charts as $name)

                <color-box title="Ventas {{ ucwords(str_replace('_', ' ', $name)) }}"
                    color="{{ $loop->index < 3 ? 'primary': 'danger' }}">

                    <div>{!! $$name->container() !!}</div>

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
    {!! $comitan->script() !!}
@endsection
