@extends('lte.root')

@push('pageTitle', 'Casas | Editar')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <color-box solid color="vks" title="Datos de la nueva casa">
                {!! Form::open(['method' => 'POST', 'route' => ['homes.edit', $home]]) !!}

                    {!! Field::text('name', $home->name, ['tpl' => 'lte/withicon'], ['icon' => 'comment']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::text('address', $home->address, ['tpl' => 'lte/withicon'], ['icon' => 'map-marked-alt']) !!}                           
                        </div>
                        <div class="col-md-6">
                            {!! Field::text('city', $home->city, ['tpl' => 'lte/withicon'], ['icon' => 'city']) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::text('postcode', $home->postcode, ['tpl' => 'lte/withicon'], ['icon' => 'envelope']) !!}                           
                        </div>
                        <div class="col-md-6">
                            {!! Field::text('phone', $home->phone, ['tpl' => 'lte/withicon'], ['icon' => 'phone']) !!}
                        </div>
                    </div>

                    <hr>
                    {!! Form::submit('EDITAR', ['class' => 'btn btn-github pull-right']) !!}
                {!! Form::close() !!}
            </color-box>
        </div>
    </div>

@endsection
