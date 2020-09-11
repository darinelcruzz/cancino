@extends('lte.root')
@push('pageTitle')
    Metas | Extras
@endpush

@section('content')
    <div class="row">
        <div class="col-md-6">
            <color-box title="Agregar extras a la meta "  color="vks">
                {!! Form::open(['method' => 'POST', 'route' => ['commision.add', $goal]]) !!}

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('sellers', $goal->sellers, ['label' => 'Vendedores', 'tpl' => 'lte/withicon', 'step' => '0.01', 'min' => '0'], ['icon' => 'user-tie']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('stock', $goal->stock, ['label' => 'Inventario', 'tpl' => 'lte/withicon', 'step' => '0.01', 'min' => '0'], ['icon' => 'coins']) !!}
                        </div>
                    </div>

                    @if($goal->store->type == 's')

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('public', $goal->public, ['tpl' => 'lte/withicon', 'step' => '0.01', 'min' => '0'], ['icon' => 'users']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('other', $goal->other, ['label' => 'Otros', 'tpl' => 'lte/withicon', 'step' => '0.01', 'min' => '0'], ['icon' => 'ellipsis-h']) !!}
                        </div>
                    </div>

                    @elseif($goal->store->type == 'p')
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('special', $goal->special, ['label' => 'Especial', 'tpl' => 'lte/withicon', 'step' => '0.01', 'min' => '0'], ['icon' => 'star']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('distributor', $goal->distributor, ['label' => 'Distribuidor', 'tpl' => 'lte/withicon', 'step' => '0.01', 'min' => '0'], ['icon' => 'truck']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('wholesale', $goal->wholesale, ['label' => 'Mayoreo', 'tpl' => 'lte/withicon', 'step' => '0.01', 'min' => '0'], ['icon' => 'cart-arrow-down']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('other', $goal->other, ['label' => 'Otros', 'tpl' => 'lte/withicon', 'step' => '0.01', 'min' => '0'], ['icon' => 'ellipsis-h']) !!}
                        </div>
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('discounts', $goal->discounts, ['label' => 'Descuentos', 'tpl' => 'lte/withicon', 'step' => '0.01', 'min' => '0'], ['icon' => 'percentage']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('steren_card', $goal->steren_card, ['label' => 'SterenCard', 'tpl' => 'lte/withicon', 'step' => '0.01', 'min' => '0'], ['icon' => 'id-card']) !!}
                        </div>
                    </div>
                    
                    <hr>
                    {!! Form::submit('Agregar', ['class' => 'btn btn-github pull-right']) !!}

                {!! Form::close() !!}
            </color-box>
        </div>
    </div>
@endsection
