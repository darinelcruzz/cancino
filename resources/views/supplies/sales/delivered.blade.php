@extends('lte.root')

@push('pageTitle', 'Insumos | Entregadas')

@push('headerTitle')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('supplies.sales.index') }}" class="btn btn-github btn-xs pull-left">
                <i class="fa fa-angle-double-left"></i>&nbsp;&nbsp;ATRÁS
            </a>
        </div>
    </div>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-8">
            <color-box title="Entregadas de {{ $store->name }}" color="vks">
                <div class="table-responsive">
                <table id="example1" class="table table-striped table-bordered table-hover table-condensed">
                    <thead>
                        <tr>
                            <th><small>CLAVE</small></th>
                            <th><small>DESCRIPCIÓN</small></th>
                            <th style="text-align: center;"><small>UNIDAD</small></th>
                            <th style="text-align: center;"><small>CANTIDAD</small></th>
                            <th style="text-align: center;"><small>PRECIO</small></th>
                            <th style="text-align: center;"><small>IMPORTE</small></th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($families as $family => $products)
                        @php
                            $famount = 0;
                        @endphp
                        <tr>
                            <th colspan="7" style="text-align:center;">
                                {{ $family }} | <a href="{{ route('supplies.invoices.create', [$store, $family]) }}">FACTURAR</a>
                            </th>
                        </tr>
                        @foreach($products as $product => $values)
                        
                        <tr>
                            <td>{{ $values[0]->supply->sat_key }}</td>
                            <td>{{ $values[0]->description ?? $values[0]->supply->description  }}</td>
                            <td style="text-align: center;"><small>{{ strtoupper($values[0]->supply->unit) }}</small></td>
                            <td style="text-align: center;">{{ $values->sum('quantity') * $values[0]->ratio }}</td>
                            <td style="text-align: right;">{{ number_format($values[0]->price/1.16, 2) }}</td>
                            <td style="text-align: right;">{{ number_format($values->sum(function ($item) { return $item->price/1.16 * $item->quantity * $item->ratio;}), 2) }}</td>

                            @php
                            $amount += $values->sum(function ($item) { return $item->price/1.16 * $item->quantity * $item->ratio;});
                            $famount += $values->sum(function ($item) { return $item->price/1.16 * $item->quantity * $item->ratio;});
                            $iva += $values->sum(function ($item) { return $item->price * $item->quantity * $item->ratio;});
                            @endphp
                        </tr>                        
                        @endforeach
                        <tr>
                            <th colspan="4"></th>
                            <th><small>TOTAL</small></th>
                            <th style="text-align: right;">{{ number_format($famount, 2) }}</th>
                        </tr>
                    @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <th colspan="4"></th>
                            <th style="text-align: right;"><small>SUBTOTAL</small></th>
                            <td style="text-align: right;">{{ number_format($amount, 2) }}</td>
                        </tr>
                        <tr>
                            <th colspan="4"></th>
                            <th style="text-align: right;"><small>IVA</small></th>
                            <td style="text-align: right;">{{ number_format($iva - $amount, 2) }}</td>
                        </tr>
                        <tr>
                            <th colspan="4"></th>
                            <th style="text-align: right;"><small>TOTAL</small></th>
                            <td style="text-align: right;">{{ number_format($iva, 2) }}</td>
                        </tr>
                    </tfoot>
                </table>
                </div>
            </color-box>
        </div>

    </div>
@endsection
