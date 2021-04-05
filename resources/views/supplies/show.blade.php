@extends('lte.root')

@push('pageTitle', 'Insumos | Ver')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <color-box title="{{ $supply->description }}" color="vks">

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::text('description', $supply->description, ['tpl' => 'lte/withicon', 'disabled' => 'true'], ['icon' => 'comment']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Field::text('sat_key', $supply->sat_key, ['tpl' => 'lte/withicon', 'disabled' => 'true'], ['icon' => 'qrcode']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::text('code', $supply->code, ['tpl' => 'lte/withicon', 'disabled' => 'true'], ['icon' => 'barcode']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Field::text('unit', $supply->unit, ['tpl' => 'lte/withicon', 'disabled' => 'true'], ['icon' => 'balance-scale']) !!}
                    </div>
                </div>

                <div class="row">
                    @foreach($supply->stocks as $stock)
                        <div class="col-md-6">
                            {!! Field::text($stock->store_id == 1 ? 'tuxtla': 'tapachula', $stock->quantity, ['tpl' => 'lte/withicon', 'disabled' => 'true', 'disabled'], ['icon' => 'sort-numeric-up']) !!}
                        </div>
                    @endforeach
                </div>

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::text('purchase_price', $supply->purchase_price, ['tpl' => 'lte/withicon', 'disabled' => 'true', 'step' => '0.01'], ['icon' => 'money-bill']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Field::text('sale_price', $supply->sale_price, ['tpl' => 'lte/withicon', 'disabled' => 'true', 'step' => '0.01'], ['icon' => 'money-bill-alt']) !!}
                    </div>
                </div>

                <h4><em>Últimos 10 movimientos</em></h4>

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Tipo</th>
                                        <th>Cantidad</th>
                                        <th>Tienda</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($supply->movements()->take(10)->get() as $movement)
                                        <tr>
                                            <td>{{ $movement->created_at->format('d/m/Y') }}</td>
                                            <td>{{ ucfirst($movement->type) }}</td>
                                            <td>{{ $movement->quantity }}</td>
                                            <td>{{ $movement->destination->id != 3 ? $movement->destination->name : 'Tapachula'}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                    </div>
                </div>
            </color-box>
        </div>
        
    </div>
@endsection
