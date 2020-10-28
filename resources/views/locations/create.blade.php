@extends('lte.root')

@push('pageTitle')
    Ubicaciones | Agregar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-6">
            <color-box title="Ubicación por usuarios" color="primary" solid>
                @if (isAdmin())                
                    @foreach ($users as $user)
                        {!! Form::open(['method' => 'POST', 'route' => ['location.assign', $user]]) !!}
                        {!!
                            Field::text('name', $user->name,
                            ['tpl' => 'lte/withicon', $user->id == 2 ? 'disabled': ''], ['icon' => 'users'])
                        !!}

                        {!!
                            Field::select('location_id', $locations, $user->location_id,
                            ['empty' => 'Seleccione una tienda', 'tpl' => 'lte/withicon', 'label' => ''], ['icon' => 'map-pin'])
                        !!}

                        <button type="submit" class="btn btn-primary pull-right" onclick="submitForm(this);">Actualizar</button>
                        <br>
                        {!! Form::close() !!}
                    @endforeach
                @else
                    {!! Form::open(['method' => 'POST', 'route' => ['location.assign', auth()->user()]]) !!}
                    {!!
                        Field::text('name', auth()->user()->name,
                        ['tpl' => 'lte/withicon', 'disabled'], ['icon' => 'users'])
                    !!}

                    {!!
                        Field::select('location_id', $locations, auth()->user()->location_id,
                        ['empty' => 'Seleccione una tienda', 'tpl' => 'lte/withicon', 'label' => ''], ['icon' => 'map-pin'])
                    !!}
                @endif
            </color-box>
        </div>
        <div class="col-md-6">
            <color-box title="Agregar ubicación" color="primary" solid>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::open(['method' => 'POST', 'route' => 'location.store']) !!}

                            {!! Field::text('name', ['tpl' => 'lte/withicon'], ['icon' => 'tag']) !!}
                            <button type="submit" class="btn btn-primary pull-right" onclick="submitForm(this);">Agregar</button>

                        {!! Form::close() !!}
                    </div>
                </div>
            </color-box>
        </div>
    </div>

@endsection
