@extends('lte.root')

@push('pageTitle', 'Grupos | Agregar')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <color-box title="Agregar nuevo grupo" color="vks">

                {!! Form::open(['method' => 'POST', 'route' => 'expenses_groups.store']) !!}

                    {!! Field::select('type', ['abono' => 'Abono', 'cargo' => 'Cargo'], null,
                        ['empty' => 'Seleccione tipo de gasto', 'tpl' => 'lte/withicon'], ['icon' => 'question-circle'])
                    !!}

                    {!! Field::text('name', ['tpl' => 'lte/withicon'], ['icon' => 'comments'])
                    !!}

                    {!! Form::submit('Agregar', ['class' => 'btn btn-github pull-right']) !!}

                {!! Form::close() !!}
            </color-box>
        </div>
        
    </div>
@endsection
