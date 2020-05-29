@extends('lte.root')

@push('pageTitle', 'Grupos | Agregar')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <color-box title="Editar grupo" color="vks">

                {!! Form::open(['method' => 'POST', 'route' => ['expenses_groups.update', $expenses_group]]) !!}

                    {!! Field::select('type', ['abono' => 'Abono', 'cargo' => 'Cargo'], $expenses_group->type,
                        ['empty' => 'Seleccione tipo de gasto', 'tpl' => 'lte/withicon'], ['icon' => 'question-circle'])
                    !!}

                    {!! Field::text('name', $expenses_group->name, ['tpl' => 'lte/withicon'], ['icon' => 'comments'])
                    !!}

                    {!! Form::submit('Guardar cambios', ['class' => 'btn btn-github pull-right']) !!}

                {!! Form::close() !!}
            </color-box>
        </div>
        
    </div>
@endsection
