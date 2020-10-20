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
                                        <ddi icon="eye" to="{{ route('supplies.sales.show', $supply_sale) }}" text="Ver"></ddi>
                                        <ddi icon="plus" to="{{ route('supplies.sales.edit', $supply_sale) }}" text="Agregar insumos"></ddi>
                                        @if(auth()->user()->level == 1 && $supply_sale->status != 'cancelada')
                                        <ddi icon="times" to="{{ route('supplies.sales.destroy', $supply_sale) }}" text="Cancelar"></ddi>
                                        @endif
                                    </dropdown>
                                </td>
                                <td>{{ $supply_sale->sold_at }}</td>
                                <td>
                                    <a href="{{ route('supplies.sales.pending', $supply_sale->store) }}">
                                        {{ $supply_sale->store->name }}
                                    </a>
                                </td>
                                <td>{{ number_format($supply_sale->amount, 2) }}</td>
                                <td><span class="label label-{{ $supply_sale->statusColor }}">{{ strtoupper($supply_sale->status) }}</span></td>
                                <td>{{ $supply_sale->user->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </color-box>
        </div>
        
    </div>
@endsection
