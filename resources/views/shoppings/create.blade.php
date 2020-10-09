@extends('lte.root')

@push('pageTitle')
    Compras | Agregar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <color-box title="Agregar compra" color="success" solid>
                {!! Form::open(['method' => 'POST', 'route' => 'shoppings.store']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::text('folio', ['tpl' => 'lte/withicon'], ['icon' => 'barcode']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::date('date', date('Y-m-d'), ['tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('amount', ['tpl' => 'lte/withicon', 'step' => '0.01'], ['icon' => 'money']) !!}
                        </div>
                        @if (isVKS())
                            <div class="col-md-6">
                                {!! Field::select('type',
                                    ['regalias' => 'Regalias', 'cargo' => 'NCargo'], null,
                                    ['empty' => 'Seleccione tipo', 'tpl' => 'lte/withicon'], ['icon' => 'archive'])
                                !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::select('store_id', $storesArray, null,
                                    ['empty' => 'Seleccione tienda', 'tpl' => 'lte/withicon'], ['icon' => 'store'])
                                !!}
                            </div>
                            <input type="hidden" name="document" value="0">
                        @else
                            <div class="col-md-6">
                                {!! Field::select('type',
                                    ['mercancia' => 'Mercancia', 'varfra' => 'Varfra'], null,
                                    ['empty' => 'Seleccione tipo', 'tpl' => 'lte/withicon'], ['icon' => 'archive'])
                                !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::number('document',['tpl' => 'lte/withicon'   ], ['icon' => 'desktop']) !!}
                            </div>
                            <input type="hidden" name="store_id" value="{{ auth()->user()->store_id }}">
                        @endif
                    </div>
                    <hr>
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="status" value="pendiente">
                    <button type="submit" class="btn btn-success pull-right" onclick="submitForm(this);">Agregar</button>

                {!! Form::close() !!}
            </solid-box>
        </div>
    </div>

@endsection
