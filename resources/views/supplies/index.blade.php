@extends('lte.root')

@push('pageTitle', 'Insumos')

@push('headerTitle')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('supplies.create') }}" class="btn btn-github btn-xs pull-left">
                <i class="fa fa-plus-square"></i>&nbsp;&nbsp;AGREGAR
            </a>
        </div>
    </div>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Insumos" color="vks">

                <table id="example1" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th><i class="fa fa-cogs"></i></th>
                            <th>Descripción</th>
                            <th>Código</th>
                            <th>Clave SAT</th>
                            <th>Cantidad</th>
                            <th>P. Compra</th>
                            <th>P. Venta</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($supplies as $supply)
                            <tr>
                                <td>{{ $supply->id }}</td>
                                <td>
                                    <dropdown icon="cogs" color="github">
                                        <ddi icon="eye" to="{{ route('supplies.show', $supply) }}" text="Ver"></ddi>
                                        <ddi icon="edit" to="{{ route('supplies.edit', $supply) }}" text="Editar"></ddi>
                                    </dropdown>
                                </td>
                                <td>{{ $supply->description }}</td>
                                <td><code>{{ $supply->code }}</code></td>
                                <td>{{ $supply->sat_key }}</td>
                                <td>{{ $supply->quantity }} {{ $supply->unit . ($supply->quantity != 1 ? 's': '') }}</td>
                                <td>{{ number_format($supply->purchase_price, 2) }}</td>
                                <td>{{ number_format($supply->sale_price, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </color-box>
        </div>
        
    </div>
@endsection
