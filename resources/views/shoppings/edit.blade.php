@extends('lte.root')

@push('pageTitle', 'Compras | Editar')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <color-box title="Editar compra" color="vks" solid>
                {!! Form::open(['method' => 'POST', 'route' => ['shoppings.update', $shopping]]) !!}

                    @if(auth()->user()->id == 2)
                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::text('folio', $shopping->folio, ['tpl' => 'lte/withicon'], ['icon' => 'barcode']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::select('store_id', $storesArray, $shopping->store_id, ['tpl' => 'lte/withicon'], ['icon' => 'store']) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::text('amount', number_format($shopping->amount, 2), ['tpl' => 'lte/withicon'], ['icon' => 'money']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::date('invoiced_at', date('Y-m-d'), ['label' => 'Fecha factura', 'tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                            </div>
                        </div>

                        <div class="row">
                            @if ($shopping->type == 'no definido')
                                <div class="col-md-6">
                                    {!! Field::select('type',
                                        ['mercancia' => 'Mercancía', 'varfra' => 'Varfra'], $shopping->type,
                                        ['empty' => 'Seleccione tipo', 'tpl' => 'lte/withicon'], ['icon' => 'archive'])
                                    !!}
                                </div>
                            @else
                                <div class="col-md-6">
                                    {!! Field::select('type',
                                        ['mercancia' => 'Mercancía', 'varfra' => 'Varfra', 'no definido' =>'No definido', 'regalias' =>'Regalías', 'nota cargo' =>'Nota cargo', 'comision' =>'Comisión', 'carrito' =>'Carrito', 'pronto pago' =>'Pronto pago', 'promocion de ventas' =>'Promoción de ventas'], $shopping->type,
                                        ['empty' => 'Seleccione tipo', 'tpl' => 'lte/withicon'], ['icon' => 'archive'])
                                    !!}
                                </div>
                            @endif

                            <div class="col-md-6">
                                {!! Field::number('document', $shopping->document, ['tpl' => 'lte/withicon'   ], ['icon' => 'desktop']) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::text('pos', $shopping->pos, ['label' => 'Documento POS (opcional)', 'tpl' => 'lte/withicon'], ['icon' => 'laptop']) !!}
                            </div>
                        </div>


                    @else


                        <div class="row">
                        <div class="col-md-6">
                            {!! Field::text('folio', $shopping->folio, ['tpl' => 'lte/withicon', 'disabled'], ['icon' => 'barcode']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::select('store_id', $storesArray, $shopping->store_id, ['tpl' => 'lte/withicon', 'disabled'], ['icon' => 'store']) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::text('amount', number_format($shopping->amount, 2), ['tpl' => 'lte/withicon', 'disabled'], ['icon' => 'money']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::date('invoiced_at', date('Y-m-d'), ['label' => 'Fecha factura', 'tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                        </div>
                    </div>

                    <div class="row">
                        @if ($shopping->type == 'no definido')
                            <div class="col-md-6">
                                {!! Field::select('type',
                                    ['mercancia' => 'Mercancía', 'varfra' => 'Varfra'], $shopping->type,
                                    ['empty' => 'Seleccione tipo', 'tpl' => 'lte/withicon'], ['icon' => 'archive'])
                                !!}
                            </div>
                        @else
                            <div class="col-md-6">
                                {!! Field::select('type',
                                    ['mercancia' => 'Mercancía', 'varfra' => 'Varfra', 'no definido' =>'No definido', 'regalias' =>'Regalías', 'nota cargo' =>'Nota cargo', 'comision' =>'Comisión', 'carrito' =>'Carrito', 'pronto pago' =>'Pronto pago', 'promocion de ventas' =>'Promoción de ventas'], $shopping->type,
                                    ['empty' => 'Seleccione tipo', 'tpl' => 'lte/withicon', 'disabled'], ['icon' => 'archive'])
                                !!}
                            </div>
                        @endif

                        <div class="col-md-6">
                            {!! Field::number('document', $shopping->document, ['tpl' => 'lte/withicon'], ['icon' => 'desktop']) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::text('pos', $shopping->pos, ['label' => 'Documento POS (opcional)', 'tpl' => 'lte/withicon'], ['icon' => 'laptop']) !!}
                        </div>
                    </div>
                    @endif
                    <hr>
                    <button type="submit" class="btn btn-github pull-right" onclick="submitForm(this);">Editar</button>

                {!! Form::close() !!}
            </solid-box>
        </div>
    </div>

@endsection
