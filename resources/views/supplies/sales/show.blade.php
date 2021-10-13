@extends('lte.root')

@push('pageTitle', 'Insumos | Venta')

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
            <color-box title="Venta #{{ $supply_sale->id }} de insumos" color="vks">

                <div class="table-responsive">
                    <table id="example1" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><small>FECHA</small></th>
                            <th><small>PRODUCTO</small></th>
                            <th><small>CANTIDAD</small></th>
                            <th><small>PRECIO</small></th>
                            <th><small>TOTAL</small></th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @foreach($supply_sale->movements as $movement)
                            <tr>
                                <td>{{ $movement->created_at->format('d/m/Y') }}</td>
                                <td>{{ $movement->description ?? $movement->supply->description }}</td>
                                <td style="text-align: center;">{{ $movement->quantity * $movement->ratio }}</td>
                                <td style="text-align: right;">{{ number_format($movement->price, 2) }}</td>
                                <td style="text-align: right;">{{ number_format($movement->ratio * $movement->quantity * $movement->price, 2) }}</td>
                            </tr>
                            @php
                                $total += $movement->ratio * $movement->quantity * $movement->price;
                            @endphp
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="3"></td>
                            <th style="text-align: right;"><small>TOTAL</small></th>
                            <th style="text-align: right;">{{ number_format($total, 2) }}</th>
                        </tr>
                    </tfoot>
                </table>
                </div>
            </color-box>
        </div>

    </div>
@endsection
