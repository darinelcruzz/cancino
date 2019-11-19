@extends('lte.root')

@push('pageTitle')
    Pendientes | Agregar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <color-box title="Agregar pendiente" color="success" solid>
                {!! Form::open(['method' => 'POST', 'route' => 'tasks.store']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::select('type', ['Imagen' => 'Imagen', 'Sistemas' => 'Sistemas', 'Operacion' => 'Operacion', 'Bancos' => 'Bancos',
                                'Corporativo' => 'Corporativo', 'Grupo Cancino' => 'Grupo Cancino', 'Compras' => 'Compras', 'Publicidad' => 'Publicidad'], null,
                                ['empty' => 'Selecciona un tipo', 'tpl' => 'lte/withicon'], ['icon' => 'ambulance'])
                            !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::select('level', ['3' => 'Alta', '2' => 'Media', '1' => 'Baja'], null,
                                ['empty' => 'Nivel de urgencia', 'tpl' => 'lte/withicon', 'label' => 'Urgencia'], ['icon' => 'sort-amount-up'])
                            !!}
                        </div>
                    </div>
                    @if (auth()->user()->store_id == 1 )
                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::select('store_id', $allStoresArray, null,
                                    ['empty' => 'Seleccione una tienda', 'tpl' => 'lte/withicon'], ['icon' => 'map-pin'])
                                    !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::date('start_at', ['tpl' => 'lte/withicon', 'label' => 'Solicitado'], ['icon' => 'calendar'])
                                    !!}
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            {!! Field::text('description', ['tpl' => 'lte/withicon'], ['icon' => 'edit']) !!}
                        </div>
                    </div>
                    <hr>
                    @if (auth()->user()->store_id != 1 )
                        <input type="hidden" name="store_id" value="{{ auth()->user()->store_id }}">
                        <input type="hidden" name="start_at" value="{{ date('Y-m-d') }}">
                    @endif
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    {!! Form::submit('Agregar', ['class' => 'btn btn-success pull-right']) !!}

                {!! Form::close() !!}
            </color-box>
        </div>
    </div>

@endsection
