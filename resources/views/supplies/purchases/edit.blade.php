@extends('lte.root')

@push('pageTitle', 'Compra | Editar')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <color-box title="Editar compra" color="vks">

                {!! Form::open(['method' => 'POST', 'route' => ['supplies.purchases.update', $supply_purchase]]) !!}

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::date('purchased_at', $supply_purchase->purchased_at, ['label' => 'Fecha creación', 'tpl' => 'lte/withicon', 'disabled' => 'true'], ['icon' => 'calendar']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::select('provider_id', $providers, $supply_purchase->provider->id, ['tpl' => 'lte/withicon', 'empty' => 'Seleccione uno'], ['icon' => 'truck']) !!}
                        </div>
                    </div>

                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                    <supplies-list model="sale" :old="{{ $supply_purchase->movements()->with('supply')->get() }}" :editable="true"></supplies-list>

                    <hr>

                    {!! Form::submit('E D I T A R', ['class' => 'btn btn-github pull-right']) !!}

                {!! Form::close() !!}
            </color-box>
        </div>

        <div class="col-md-6">
            <color-box title="Productos" color="vks">
                <supplies color="github" store="1"></supplies>
            </color-box>
        </div>
        
    </div>
@endsection
