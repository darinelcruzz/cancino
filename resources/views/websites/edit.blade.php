@extends('lte.root')

@push('pageTitle', 'Portales | Editar')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <color-box title="Editar portal" color="vks">

                {!! Form::open(['method' => 'POST', 'route' => ['websites.update', $website]]) !!}

                    {!! Field::text('name', $website->name, ['tpl' => 'lte/withicon'], ['icon' => 'comments']) !!}
                    {!! Field::text('url', $website->url, ['tpl' => 'lte/withicon'], ['icon' => 'globe']) !!}
                    {!! Field::text('username', $website->username, ['tpl' => 'lte/withicon'], ['icon' => 'user']) !!}
                    {!! Field::text('password', $website->password, ['tpl' => 'lte/withicon'], ['icon' => 'key']) !!}

                    <input type="hidden" name="store_id" value="{{ getStore()->id }}">

                    {!! Form::submit('Editar', ['class' => 'btn btn-github pull-right']) !!}

                {!! Form::close() !!}
            </color-box>
        </div>
        
    </div>
@endsection
