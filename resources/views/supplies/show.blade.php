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

                <h3>Total vendido</h3>

                <div class="row">
                @foreach($supply->movements()->where('movable_type', 'App\SupplySale')->with('movable')->get()->groupBy('movable.store_id') as $store_id => $movements)
                    <div class="col-md-6">
                        {!! Field::text(App\Store::find($store_id)->name, $movements->sum('quantity'), ['tpl' => 'lte/withicon', 'disabled' => 'true'], ['icon' => 'store']) !!}
                    </div>
                @endforeach
                    <div class="col-md-6">
                        {!! Field::text('Todas', $supply->totalSold, ['tpl' => 'lte/withicon', 'disabled' => 'true'], ['icon' => 'store']) !!}
                    </div>
                </div>
            </color-box>
        </div>
        
    </div>
@endsection
