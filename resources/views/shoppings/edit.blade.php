@extends('lte.root')

@push('pageTitle')
    Compras | Editar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <color-box title="Editar compra" color="vks" solid>
                {!! Form::open(['method' => 'POST', 'route' => ['shoppings.update', $shopping]]) !!}

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::text('folio', $shopping->folio, ['tpl' => 'lte/withicon', 'disabled' => 'true'], ['icon' => 'barcode']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::select('store_id', $storesArray, $shopping->store_id, ['tpl' => 'lte/withicon', 'disabled' => 'true'], ['icon' => 'store']) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::text('amount', number_format($shopping->amount, 2), ['tpl' => 'lte/withicon', 'disabled' => 'true'], ['icon' => 'money']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::date('invoiced_at', date('Y-m-d'), ['label' => 'Fecha factura', 'tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                        </div>
                    </div>

                    <div class="row">
                        @if ($shopping->type == 'mercancia')
                            <div class="col-md-6">
                                {!! Field::select('type',
                                    ['mercancia' => 'Mercancía', 'varfra' => 'Varfra'], $shopping->type,
                                    ['empty' => 'Seleccione tipo', 'tpl' => 'lte/withicon'], ['icon' => 'archive'])
                                !!}
                            </div>
                        @else
                            <div class="col-md-6">
                                {!! Field::text('type', $shopping->type, ['tpl' => 'lte/withicon', 'disabled'], ['icon' => 'archive'])
                                !!}
                            </div>
                        @endif

                        <div class="col-md-6">
                            {!! Field::number('document',['tpl' => 'lte/withicon'   ], ['icon' => 'desktop']) !!}
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-github pull-right" onclick="submitForm(this);">Editar</button>

                {!! Form::close() !!}
            </solid-box>
        </div>
    </div>

@endsection
