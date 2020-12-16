@extends('lte.root')

@push('pageTitle', 'Transferencias | Agregar')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <color-box title="Nuevo movimiento o transferencia" color="vks">

                {!! Form::open(['method' => 'POST', 'route' => 'supplies.transfers.store']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::select('transferred_from', $stores, null, ['tpl' => 'lte/withicon', 'empty' => 'Seleccione tienda', 'v-model.number' => 'store_id'], ['icon' => 'store']) !!}
                        </div>
                        <div v-if="store_id == 1" class="col-md-6">
                            {!! Field::text('transferred_to', $stores[3], ['tpl' => 'lte/withicon'], ['icon' => 'truck']) !!}
                            <input type="hidden" name="transferred_to" value="3">
                        </div>
                        <div v-else class="col-md-6">
                            {!! Field::text('transferred_to', $stores[1], ['tpl' => 'lte/withicon'], ['icon' => 'truck']) !!}
                            <input type="hidden" name="transferred_to" value="1">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::date('transferred_at', date('Y-m-d'), ['label' => 'Fecha', 'tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::text('observations', ['tpl' => 'lte/withicon'], ['icon' => 'comments']) !!}
                        </div>
                    </div>

                    <supplies-list model="sale"></supplies-list>

                    <hr>

                    {!! Form::submit('A G R E G A R', ['class' => 'btn btn-github pull-right']) !!}

                {!! Form::close() !!}
            </color-box>
        </div>

        <div class="col-md-6">
            <color-box title="Productos" color="vks">
                <supplies color="github" :store="store_id % 3 == 0 ? 3: 1"></supplies>
            </color-box>
        </div>
        
    </div>
@endsection
