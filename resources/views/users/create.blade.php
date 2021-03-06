@extends('lte.root')

@push('pageTitle')
    Usuarios | Agregar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-6  col-md-offset-3">
            <color-box title="Agregar compra" color="success" solid>
                {!! Form::open(['method' => 'POST', 'route' => 'users.store', 'class' => 'form-horizontal']) !!}
                    {!! Field::text('name', ['tpl' => 'lte/oneline'], ['icon' => 'id-card']) !!}
                    {!! Field::text('username', ['tpl' => 'lte/oneline'], ['icon' => 'user']) !!}
                    {!! Field::text('email', ['tpl' => 'lte/oneline'], ['icon' => 'at']) !!}
                    {!! Field::select('level',
                        ['1' => 'Admin', '2' => 'Alta', '3' => 'Supervisor', '4' => 'Gerente', '5' => 'Apoyo',
                        '6' => 'B2B', '7' => 'Corte'], null,
                        ['empty' => 'Seleccione un nivel', 'tpl' => 'lte/oneline'], ['icon' => 'sitemap'])
                    !!}
                    {!! Field::select('store_id', $allStoresArray, null,
                        ['empty' => 'Seleccione una tienda', 'tpl' => 'lte/oneline'], ['icon' => 'map-pin'])
                    !!}
                    <hr>
                    {!! Field::password('password', ['tpl' => 'lte/oneline', ], ['icon' => 'key']) !!}
                    {!! Field::password('password_confirmation', ['tpl' => 'lte/oneline', ], ['icon' => 'key']) !!}


                    <button type="submit" class="btn btn-success pull-right" onclick="submitForm(this);">Agregar</button>

                {!! Form::close() !!}
            </color-box>
        </div>
    </div>

@endsection
