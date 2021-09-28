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
                    @foreach($products as $key => $values)
                        @foreach($values as $value)
                        <tr>
                            <td>{{ $value[0]->supply->sat_key }}</td>
                            <td>{{ $value[0]->description ?? $value[0]->supply->description  }}</td>
                            <td style="text-align: center;"><small>{{ strtoupper($value[0]->supply->unit) }}</small></td>
                            <td style="text-align: center;">{{ $value->sum('quantity') * $value[0]->ratio }}</td>
                            <td style="text-align: right;">{{ number_format($value[0]->price/1.16, 2) }}</td>
                            <td style="text-align: right;">{{ number_format($value->sum(function ($item) { return $item->price/1.16 * $item->quantity * $item->ratio;}), 2) }}</td>

                            @php
                            $amount += $value->sum(function ($item) { return $item->price/1.16 * $item->quantity * $item->ratio;});
                            $iva += $value->sum(function ($item) { return $item->price * $item->quantity * $item->ratio;});
                            @endphp
                        </tr>                        
                        @endforeach
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
