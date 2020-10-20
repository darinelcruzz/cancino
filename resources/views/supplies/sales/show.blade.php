@extends('lte.root')

@push('pageTitle', 'Insumos | Ventas')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Venta #{{ $supply_sale->id }} de insumos" color="vks">

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
                                <td>{{ $movement->quantity }}</td>
                                <td>{{ number_format($movement->price, 2) }}</td>
                                <td>{{ number_format($movement->quantity * $movement->price, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="3"></td>
                            <th>Total:</th>
                            <th>{{ number_format($supply_sale->amount, 2) }}</th>
                        </tr>
                    </tfoot>
                </table>
            </color-box>
        </div>
        
    </div>
@endsection
