@extends('lte.root')

@push('pageTitle', 'Compras de insumos | Agregar')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <color-box title="Agregar nueva compra" color="vks">

                {!! Form::open(['method' => 'POST', 'route' => 'supplies.purchases.store']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::date('purchased_at', date('Y-m-d'), ['tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::select('provider_id', $providers, null, ['tpl' => 'lte/withicon', 'empty' => 'Seleccione un proveedor'], ['icon' => 'truck']) !!}
                        </div>
                    </div>

                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                    <supplies-list model="purchase"></supplies-list>

                    <hr>

                    {!! Form::submit('A G R E G A R', ['class' => 'btn btn-github pull-right']) !!}

                {!! Form::close() !!}
            </color-box>
        </div>

        <div class="col-md-6">
            <color-box title="Productos" color="vks">
                <supplies color="github"></supplies>
            </color-box>
        </div>
        
    </div>
@endsection
