@extends('lte.root')

@push('pageTitle', 'Insumos | Editar')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <color-box title="Editar producto" color="vks">

                {!! Form::open(['method' => 'POST', 'route' => ['supplies.update', $supply]]) !!}

                    {!! Field::text('description', $supply->description, ['tpl' => 'lte/withicon'], ['icon' => 'comment']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::text('code', $supply->code, ['tpl' => 'lte/withicon'], ['icon' => 'barcode']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::text('sat_key', $supply->sat_key, ['tpl' => 'lte/withicon'], ['icon' => 'qrcode']) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('quantity', $supply->quantity, ['tpl' => 'lte/withicon'], ['icon' => 'sort-numeric-up']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::text('unit', $supply->unit, ['tpl' => 'lte/withicon'], ['icon' => 'balance-scale']) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('purchase_price', $supply->purchase_price, ['tpl' => 'lte/withicon', 'step' => '0.01'], ['icon' => 'money-bill']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('sale_price', $supply->sale_price, ['tpl' => 'lte/withicon', 'step' => '0.01'], ['icon' => 'money-bill-alt']) !!}
                        </div>
                    </div>

                    <hr>

                    {!! Form::submit('C A M B I A R', ['class' => 'btn btn-github pull-right']) !!}

                {!! Form::close() !!}
            </color-box>
        </div>
        
    </div>
@endsection
