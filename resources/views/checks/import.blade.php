@extends('lte.root')

@push('pageTitle', 'Cheques | Importar')

@section('content')
    <div class="row">
        <div class="col-md-5">
            <color-box title="Importar cheques" color="primary" solid>

                {!! Form::open(['method' => 'POST', 'route' => 'checks.import', 'enctype' => 'multipart/form-data']) !!}
                    
                    {!! Form::file('checks') !!}

                    {!! Form::submit('Importar', ['class' => 'btn btn-primary pull-right']) !!}

                {!! Form::close() !!}
            </color-box>
        </div>
    </div>

@endsection