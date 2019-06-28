@extends('lte.root')
@push('pageTitle')
    Ventas | Lista
@endpush

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            {!! Form::open(['method' => 'POST', 'route' => 'admin.public']) !!}

                <div class="row">
                    <div class="col-md-10">
                        {!! Field::month('date', $date, ['label' => 'Seleccione mes', 'tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                    </div>
                    <div class="col-md-2">
                        <label>&nbsp;</label><br>
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <color-box title="Ventas Chiapas" color="primary">
                <div>
                    {!! $chiapas->container() !!}
                </div>
                <br>
                @php
                    $num = '2';
                @endphp
                @include('templates/progress')
            </color-box>

            <color-box title="Ventas Soconusco" color="primary">
                <div>
                    {!! $soconusco->container() !!}
                </div>
                <br>
                @php
                    $num = '3';
                @endphp
                @include('templates/progress')
            </color-box>

            <color-box title="Ventas Altos" color="primary">
                <div>
                    {!! $altos->container() !!}
                </div>
                <br>
                @php
                    $num = '4';
                @endphp
                @include('templates/progress')
            </color-box>

            <color-box title="Ventas Gale Tux" color="danger">
                <div>
                    {!! $galetux->container() !!}
                </div>
                <br>
                @php
                    $num = '5';
                @endphp
                @include('templates/progress')
            </color-box>

            <color-box title="Ventas Gale Tapa" color="danger">
                <div>
                    {!! $galetapa->container() !!}
                </div>
                <br>
                @php
                    $num = '6';
                @endphp
                @include('templates/progress')
            </color-box>
        </div>
    </div>

@endsection

@section('chart')
    {!! $chiapas->script() !!}
    {!! $soconusco->script() !!}
    {!! $altos->script() !!}
    {!! $galetux->script() !!}
    {!! $galetapa->script() !!}
@endsection
