@extends('lte.root')

@push('pageTitle', 'Grupos | Agregar')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <color-box title="Editar grupo" color="vks">

                {!! Form::open(['method' => 'POST', 'route' => ['providers.update', $provider]]) !!}

                    

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::select('expenses_group_id', $expenses_groups, $provider->expenses_group_id,
                                ['empty' => 'Seleccione grupo de gastos', 'tpl' => 'lte/withicon'], ['icon' => 'question-circle'])
                            !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::select('vks', [0 => 'No', 1 => 'Sí'], $provider->vks,
                                ['empty' => '¿Pertenece a VKS?', 'tpl' => 'lte/withicon'], ['icon' => 'pen-nib'])
                            !!}
                        </div>
                    </div>

                    {!! Field::text('business', $provider->business, ['tpl' => 'lte/withicon'], ['icon' => 'comments']) !!}
                    
                    {!! Field::text('social', $provider->social, ['tpl' => 'lte/withicon'], ['icon' => 'comment']) !!}

                    {!! Form::submit('Guardar cambios', ['class' => 'btn btn-github pull-right']) !!}

                {!! Form::close() !!}
            </color-box>
        </div>
        
    </div>
@endsection
