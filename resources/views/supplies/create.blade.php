@extends('lte.root')

@push('pageTitle', 'Insumos | Agregar')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <color-box title="Agregar nuevo producto" color="vks">

                {!! Form::open(['method' => 'POST', 'route' => 'supplies.store']) !!}

                    {!! Field::text('description', ['tpl' => 'lte/withicon'], ['icon' => 'comment']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::text('code', ['tpl' => 'lte/withicon'], ['icon' => 'barcode']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::text('sat_key', ['tpl' => 'lte/withicon'], ['icon' => 'qrcode']) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('quantity', 0, ['tpl' => 'lte/withicon', 'disabled'], ['icon' => 'sort-numeric-up']) !!}
                            <input type="hidden" value="0" name="quantity">
                        </div>
                        <div class="col-md-6">
                            {!! Field::text('unit', ['tpl' => 'lte/withicon'], ['icon' => 'balance-scale']) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('purchase_price', ['tpl' => 'lte/withicon', 'step' => '0.01'], ['icon' => 'money-bill']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('sale_price', ['tpl' => 'lte/withicon', 'step' => '0.01'], ['icon' => 'money-bill-alt']) !!}
                        </div>
                    </div>

                    <hr>

                    {!! Form::submit('A G R E G A R', ['class' => 'btn btn-github pull-right']) !!}

                {!! Form::close() !!}
            </color-box>
        </div>
        
    </div>
@endsection
