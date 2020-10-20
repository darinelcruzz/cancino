@extends('lte.root')

@push('pageTitle', 'Insumos | Ver')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <color-box title="{{ $supply->description }}" color="vks">

                {!! Field::text('description', $supply->description, ['tpl' => 'lte/withicon', 'disabled' => 'true'], ['icon' => 'comment']) !!}

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::text('code', $supply->code, ['tpl' => 'lte/withicon', 'disabled' => 'true'], ['icon' => 'barcode']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Field::text('sat_key', $supply->sat_key, ['tpl' => 'lte/withicon', 'disabled' => 'true'], ['icon' => 'qrcode']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::text('quantity', $supply->quantity, ['tpl' => 'lte/withicon', 'disabled' => 'true', 'disabled'], ['icon' => 'sort-numeric-up']) !!}
                        <input type="hidden" value="0" name="quantity">
                    </div>
                    <div class="col-md-6">
                        {!! Field::text('unit', $supply->unit, ['tpl' => 'lte/withicon', 'disabled' => 'true'], ['icon' => 'balance-scale']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::text('purchase_price', $supply->purchase_price, ['tpl' => 'lte/withicon', 'disabled' => 'true', 'step' => '0.01'], ['icon' => 'money-bill']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Field::text('sale_price', $supply->sale_price, ['tpl' => 'lte/withicon', 'disabled' => 'true', 'step' => '0.01'], ['icon' => 'money-bill-alt']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::text('Total vendido', $supply->totalSold, ['tpl' => 'lte/withicon', 'disabled' => 'true', 'step' => '0.01'], ['icon' => 'coins']) !!}
                    </div>
                </div>
            </color-box>
        </div>
        
    </div>
@endsection
