@extends('lte.root')

@push('pageTitle', 'Conceptos | Agregar')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <color-box title="Agregar nuevo concepto" color="vks">

                {!! Form::open(['method' => 'POST', 'route' => 'concepts.store']) !!}

                    {!! Field::select('provider_id', $providers, null,
                        ['empty' => 'Seleccione el proveedor', 'tpl' => 'lte/withicon'], ['icon' => 'truck'])
                    !!}

                    {!! Field::text('description', ['tpl' => 'lte/withicon'], ['icon' => 'comments']) !!}

                    {!! Form::submit('Agregar', ['class' => 'btn btn-github pull-right']) !!}

                {!! Form::close() !!}
            </color-box>
        </div>
        
    </div>
@endsection
