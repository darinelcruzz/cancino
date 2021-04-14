@extends('lte.root')

@push('pageTitle', 'Casas | Agregar')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <color-box solid color="vks" title="Datos de la nueva casa">
                {!! Form::open(['method' => 'POST', 'route' => 'homes.store']) !!}

                    {!! Field::text('name', ['tpl' => 'lte/withicon'], ['icon' => 'comment']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::text('address', ['tpl' => 'lte/withicon'], ['icon' => 'map-marked-alt']) !!}                           
                        </div>
                        <div class="col-md-6">
                            {!! Field::text('city', ['tpl' => 'lte/withicon'], ['icon' => 'city']) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::text('postcode', ['tpl' => 'lte/withicon'], ['icon' => 'envelope']) !!}                           
                        </div>
                        <div class="col-md-6">
                            {!! Field::text('phone', ['tpl' => 'lte/withicon'], ['icon' => 'phone']) !!}
                        </div>
                    </div>

                    <hr>
                    {!! Form::submit('AGREGAR', ['class' => 'btn btn-github pull-right']) !!}
                {!! Form::close() !!}
            </color-box>
        </div>
    </div>

@endsection
