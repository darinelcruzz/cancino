@extends('lte.root')

@push('pageTitle', 'Insumos | Compra')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Compra #{{ $supply_purchase->id }} de insumos" color="vks">

                <div class="table-responsive">
                    <table id="example1" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($supply_purchase->movements as $movement)
                            <tr>
                                <td>{{ $movement->supply->description }}</td>
                                <td>{{ $movement->quantity }}</td>
                                <td>{{ number_format($movement->price, 2) }}</td>
                                <td>{{ number_format($movement->quantity * $movement->price, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <th>Total:</th>
                            <th>{{ number_format($supply_purchase->amount, 2) }}</th>
                        </tr>
                    </tfoot>
                </table>
                </div>
            </color-box>
        </div>
        
    </div>
@endsection
