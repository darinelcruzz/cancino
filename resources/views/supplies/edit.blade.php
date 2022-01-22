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
                            <code>Sugerido {{ fnumber($supply->purchase_price * 1.25) }}</code>
                        </div>
                    </div>

                    @if($supply->byproducts)

                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Subproducto</th>
                                        <th>Relación</th>
                                        <th>Precio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($supply->byproducts as $byproduct)
                                    <tr>
                                        <td>{{ $byproduct['name'] }}</td>
                                        <td>1:{{ $byproduct['ratio'] }}</td>
                                        <td>{{ $byproduct['price'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    @endif

                    <br>
                    <a href="{{ route('supplies.add', $supply) }}" class="btn btn-xs btn-success">
                        <i class="fa fa-plus"></i> <small>SUBPRODUCTO</small>
                    </a>

                    <hr>

                    <a href="{{ route('supplies.index') }}" class="btn btn-danger pull-left">
                        <i class="fa fa-backward"></i> <small>ATRÁS</small>
                    </a>
                    {!! Form::submit('C A M B I A R', ['class' => 'btn btn-github pull-right']) !!}

                {!! Form::close() !!}
            </color-box>
        </div>

    </div>
@endsection
