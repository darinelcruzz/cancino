@extends('lte.root')

@push('pageTitle', 'Proveedores | Agregar')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <color-box title="Agregar nuevo proveedor" color="vks">

                {!! Form::open(['method' => 'POST', 'route' => 'providers.store']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::select('expenses_group_id', $expenses_groups, null,
                                ['empty' => 'Seleccione grupo de gasto', 'tpl' => 'lte/withicon'], ['icon' => 'question-circle'])
                            !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::select('vks', [0 => 'No', 1 => 'Sí'], 0,
                                ['label' => 'VKS', 'empty' => '¿Pertenece a VKS?', 'tpl' => 'lte/withicon'], ['icon' => 'pen-nib'])
                            !!}
                        </div>
                    </div>

                    {!! Field::text('business', ['tpl' => 'lte/withicon'], ['icon' => 'comments']) !!}
                    
                    {!! Field::text('social', ['tpl' => 'lte/withicon'], ['icon' => 'comment']) !!}

                    {!! Form::submit('Agregar', ['class' => 'btn btn-github pull-right']) !!}

                {!! Form::close() !!}
            </color-box>
        </div>
        
    </div>
@endsection
