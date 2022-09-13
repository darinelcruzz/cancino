@extends('lte.root')

@push('pageTitle', 'Ventas de insumos | Agregar')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <color-box title="Agregar nueva venta" color="vks">

                {!! Form::open(['method' => 'POST', 'route' => 'supplies.sales.store']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::date('sold_at', date('Y-m-d'), ['label' => 'Fecha', 'tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::select('store_id', $stores, null, ['tpl' => 'lte/withicon', 'empty' => 'Seleccione tienda', 'v-model.number' => 'store_id'], ['icon' => 'store']) !!}
                        </div>
                    </div>

                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                    <supplies-list model="sale"></supplies-list>

                    <hr>

                    {!! Form::submit('A G R E G A R', ['class' => 'btn btn-github pull-right']) !!}

                {!! Form::close() !!}
            </color-box>
        </div>

        <div class="col-md-6">
            <color-box title="Productos" color="vks">
                <supplies color="github" :store="(store_id == 3 || store_id == 6) ? 3: 1"></supplies>
            </color-box>
        </div>
        
    </div>
@endsection
