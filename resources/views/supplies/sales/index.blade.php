@extends('lte.root')

@push('pageTitle', 'Insumos | Ventas')

@push('headerTitle')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('supplies.sales.create') }}" class="btn btn-github btn-xs pull-left">
                <i class="fa fa-plus-square"></i>&nbsp;&nbsp;AGREGAR
            </a>
        </div>
    </div>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Ventas de insumos" color="vks">

                <table id="example1" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th><i class="fa fa-cogs"></i></th>
                            <th>Fecha</th>
                            <th>Tienda</th>
                            <th>Importe</th>
                            <th>Estado</th>
                            <th>Usuario</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($supply_sales as $supply_sale)
                            <tr>
                                <td>{{ $supply_sale->id }}</td>
                                <td>
                                    <dropdown icon="cogs" color="github">
                                        <ddi icon="edit" to="{{ route('supplies.sales.edit', $supply_sale) }}" text="Editar"></ddi>
                                        <ddi icon="eye" to="{{ route('supplies.sales.show', $supply_sale) }}" text="Ver"></ddi>
                                    </dropdown>
                                </td>
                                <td>{{ $supply_sale->sold_at }}</td>
                                <td>{{ $supply_sale->store->name }}</td>
                                <td>{{ number_format($supply_sale->amount, 2) }}</td>
                                <td>{{ $supply_sale->status }}</td>
                                <td>{{ $supply_sale->user->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </color-box>
        </div>
        
    </div>
@endsection
