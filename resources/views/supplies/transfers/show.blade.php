@extends('lte.root')

@push('pageTitle', 'Insumos | Transferencias')

@push('headerTitle')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('supplies.transfers.index') }}" class="btn btn-github btn-xs pull-left">
                <i class="fa fa-angle-double-left"></i>&nbsp;&nbsp;ATRÁS
            </a>
        </div>
    </div>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-6">
            <color-box title="Transferencia #{{ $supply_transfer->id }} de insumos" color="vks">

                <table id="example1" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Producto</th>
                            <th style="text-align: center;">Cantidad</th>
                            <th style="text-align: right;">Precio</th>
                            <th style="text-align: right;">Importe</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($supply_transfer->movements as $movement)
                            <tr>
                                <td>{{ $movement->created_at->format('d/m/Y') }}</td>
                                <td>{{ $movement->supply->description }}</td>
                                <td style="text-align: center;">{{ $movement->quantity }}</td>
                                <td style="text-align: right;">{{ number_format($movement->price, 2) }}</td>
                                <td style="text-align: right;">{{ number_format($movement->quantity * $movement->price, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="3"></td>
                            <th>Total</th>
                            <th style="text-align: right;">{{ number_format($supply_transfer->movements->sum(function ($m) { return $m->price * $m->quantity;}), 2) }}</th>
                        </tr>
                    </tfoot>
                </table>
            </color-box>
        </div>
        
    </div>
@endsection
