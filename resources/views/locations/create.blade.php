@extends('lte.root')

@push('pageTitle')
    Ubicaciones | Agregar
@endpush

@section('content')
    <div class="row">
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
        <div class="col-md-6">
            <color-box title="Ubicación por usuarios" color="primary" solid>
                    @foreach ($users as $user)
                        {!! Form::open(['method' => 'POST', 'route' => ['users.update', $user->id]]) !!}
                            {!!
                                Field::select('location_id', $locations, $user->location_id,
                                ['empty' => 'Seleccione una tienda', 'tpl' => 'lte/withicon', 'label' => $user->name], ['icon' => 'map-pin'])
                            !!}

                            <button type="submit" class="btn btn-primary pull-right" onclick="submitForm(this);">Actualizar</button>
                            <br>
                        {!! Form::close() !!}
                    @endforeach

            </color-box>
        </div>
    </div>

@endsection
