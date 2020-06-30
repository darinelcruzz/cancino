@extends('lte.root')

@push('pageTitle', 'Portales | Agregar')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <color-box title="Agregar nuevo Portal" color="vks">

                {!! Form::open(['method' => 'POST', 'route' => 'websites.store']) !!}

                    {!! Field::text('name', ['tpl' => 'lte/withicon'], ['icon' => 'comments']) !!}
                    {!! Field::text('url', ['tpl' => 'lte/withicon'], ['icon' => 'globe']) !!}
                    {!! Field::text('username', ['tpl' => 'lte/withicon'], ['icon' => 'user']) !!}
                    {!! Field::text('password', ['tpl' => 'lte/withicon'], ['icon' => 'key']) !!}

                    <input type="hidden" name="store_id" value="{{ getStore()->id }}">

                    {!! Form::submit('Agregar', ['class' => 'btn btn-github pull-right']) !!}

                {!! Form::close() !!}
            </color-box>
        </div>
        
    </div>
@endsection
