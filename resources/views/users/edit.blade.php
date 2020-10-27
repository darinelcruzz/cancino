@extends('lte.root')

@push('pageTitle')
    Usuarios | Editar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-6  col-md-offset-3">
            <color-box title="Editar usuario" color="vks" solid>
                {!! Form::open(['method' => 'POST', 'route' => ['users.update', $user], 'class' => 'form-horizontal']) !!}
                    {!! Field::text('name', $user->name, ['tpl' => 'lte/oneline'], ['icon' => 'id-card']) !!}
                    {!! Field::text('username', $user->username, ['tpl' => 'lte/oneline'], ['icon' => 'user']) !!}
                    {!! Field::text('email', $user->email, ['tpl' => 'lte/oneline'], ['icon' => 'at']) !!}
                    {!! Field::select('level',
                        ['1' => 'Admin', '2' => 'Alta', '3' => 'Supervisor', '4' => 'Gerente', '5' => 'Apoyo',
                        '6' => 'B2B', '7' => 'Corte'],  $user->level,
                        ['empty' => 'Seleccione un nivel', 'tpl' => 'lte/oneline'], ['icon' => 'sitemap'])
                    !!}
                    {!! Field::select('store_id', $allStoresArray,  $user->store_id,
                        ['empty' => 'Seleccione una tienda', 'tpl' => 'lte/oneline'], ['icon' => 'map-pin'])
                    !!}
                    <hr>
                    {!! Field::password('password', ['tpl' => 'lte/oneline', ], ['icon' => 'key']) !!}
                    {!! Field::password('password_confirmation', ['tpl' => 'lte/oneline', ], ['icon' => 'key']) !!}


                    <button type="submit" class="btn btn-github pull-right" onclick="submitForm(this);">Agregar</button>

                {!! Form::close() !!}
            </solid-box>
        </div>
    </div>

@endsection
