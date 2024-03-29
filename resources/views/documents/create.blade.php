@extends('lte.root')
@push('pageTitle')
    Documentos | Agregar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-5">
            <color-box title="Agregar PDFs" color="success">
                {!! Form::open(['method' => 'POST', 'route' => 'documents.store', 'enctype' => 'multipart/form-data']) !!}
                <div class="row">
                    <div class="col-md-6">
                        {!! Field::select('store', $allStoresArray + ['0' => 'Generales'], null, ['empty' => 'Seleccione la tienda', 'tpl' => 'lte/withicon'], ['icon' => 'store'])
                            !!}
                    </div>
                    <div class="col-md-6">
                        {!! Field::text('name',['tpl' => 'lte/withicon'], ['icon' => 'file']) !!}
                    </div>
                </div>
                <div class="row">
                    <br>
                    <div class="col-md-12" align="center">
                        <input type="file" name="doc">
                    </div>
                    <br><br><br>
                </div>
                    <hr>
                    {!! Form::submit('Agregar', ['class' => 'btn btn-success btn-block']) !!}
                {!! Form::close() !!}
            </color-box>
        </div>
    </div>
@endsection
