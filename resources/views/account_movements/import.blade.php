@extends('lte.root')

@push('pageTitle', 'Movimientos | Importar')

@section('content')
    <div class="row">
        <div class="col-md-5">
            <color-box title="Importar movimientos" color="vks" solid>

                {!! Form::open(['method' => 'POST', 'route' => 'account_movements.import', 'enctype' => 'multipart/form-data']) !!}
                    
                    {!! Form::file('account_movements') !!}

                    {!! Form::submit('Importar', ['class' => 'btn btn-github pull-right']) !!}

                {!! Form::close() !!}
            </color-box>
        </div>
    </div>

@endsection