@extends('lte.root')

@push('pageTitle', 'Actualizar')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <color-box title="Subir excel para actualizar inventario" color="vks" solid>
                {!! Form::open(['method' => 'POST', 'route' => 'inventory.upload', 'enctype' => 'multipart/form-data']) !!}
                    
                    {!! Field::select('type', ['product' => 'Existencias', 'barcode' => 'Códigos de barra'], null,
                        ['empty' => '¿Qué archivo estás subiendo?', 'tpl' => 'lte/withicon'], ['icon' => 'question'])
                    !!}

                    {!! Field::file('excel', ['label' => 'Archivo de excel', 'tpl' => 'lte/withicon'], ['icon' => 'file-excel']) !!}

                    <hr>
                    {!! Form::submit('S U B I R', ['class' => 'btn btn-github pull-right']) !!}

                {!! Form::close() !!}
            </color-box>
        </div>
        @if(session('status'))
            <div class="col-md-6">
                <div class="alert alert-success">
                    {!! session('status') !!}
                </div>
            </div>
        @endif
    </div>

@endsection
