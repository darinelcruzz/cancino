@extends('lte.root')

@push('pageTitle', 'Venta | Agregar insumos')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <color-box title="Agregar insumos" color="vks">

                {!! Form::open(['method' => 'POST', 'route' => ['supplies.sales.update', $supply_sale]]) !!}

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::date('sold_at', $supply_sale->sold_at, ['label' => 'Fecha creación', 'tpl' => 'lte/withicon', 'disabled' => 'true'], ['icon' => 'calendar']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::text('store_id', $supply_sale->store->name, ['tpl' => 'lte/withicon', 'disabled' => 'true'], ['icon' => 'store']) !!}
                        </div>
                    </div>

                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                    <supplies-list model="sale" :old="{{ $supply_sale->movements()->with('supply')->get() }}"></supplies-list>

                    <hr>

                    {!! Form::submit('A G R E G A R', ['class' => 'btn btn-github pull-right']) !!}

                {!! Form::close() !!}
            </color-box>
        </div>

        <div class="col-md-6">
            <color-box title="Productos" color="vks">
                <supplies color="github" store="{{ $supply_sale->store_id % 3 == 0 ? 3: 1 }}"></supplies>
            </color-box>
        </div>
        
    </div>
@endsection
