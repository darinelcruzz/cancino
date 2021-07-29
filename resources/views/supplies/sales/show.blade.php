@extends('lte.root')

@push('pageTitle', 'Insumos | Ventas')

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
                            <th>Fecha</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($supply_sale->movements as $movement)
                            <tr>
                                <td>{{ $movement->created_at->format('d/m/Y') }}</td>
                                <td>{{ $movement->supply->description }}</td>
                                <td style="text-align: center;">{{ $movement->quantity * $movement->supply->ratio }}</td>
                                <td style="text-align: right;">{{ number_format($movement->price, 2) }}</td>
                                <td style="text-align: right;">{{ number_format($movement->supply->ratio * $movement->quantity * $movement->price, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="3"></td>
                            <th style="text-align: right;"><small>TOTAL</small></th>
                            <th style="text-align: right;">{{ number_format($supply_sale->amount, 2) }}</th>
                        </tr>
                    </tfoot>
                </table>
                </div>
            </color-box>
        </div>
        
    </div>
@endsection
