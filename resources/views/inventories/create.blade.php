@extends('lte.root')

@push('pageTitle', 'Inventarios | Agregar')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <color-box title="Agregar  nuevo inventario" color="vks" solid>
                {!! Form::open(['method' => 'POST', 'route' => 'inventory.store', 'enctype' => 'multipart/form-data']) !!}
                    
                    {!! Field::select('store_id', $stores, null,
                        ['empty' => 'Elija una tienda', 'tpl' => 'lte/withicon'], ['icon' => 'store'])
                    !!}

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::date('started_at', date('Y-m-d'), ['label' => 'Fecha inicio', 'tpl' => 'lte/withicon'], ['icon' => 'calendar-plus']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::date('ended_at', date('Y-m-d', time() + 24*60*60), ['label' => 'Fecha final (opcional)', 'tpl' => 'lte/withicon'], ['icon' => 'calendar-check']) !!}
                        </div>
                    </div>
                    
                    {!! Field::file('excel', ['label' => 'Archivo de excel con inventario actual', 'tpl' => 'lte/withicon'], ['icon' => 'file-excel']) !!}

                    <hr>
                    {!! Form::submit('Agregar', ['class' => 'btn btn-github pull-right']) !!}

                {!! Form::close() !!}
            </solid-box>
        </div>
    </div>

@endsection
