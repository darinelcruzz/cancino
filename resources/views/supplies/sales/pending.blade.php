@extends('lte.root')

@push('pageTitle', 'Insumos | Pendientes')

{{-- @push('headerTitle')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('supplies.sales.create') }}" class="btn btn-github btn-xs pull-left">
                <i class="fa fa-plus-square"></i>&nbsp;&nbsp;AGREGAR
            </a>
        </div>
    </div>
@endpush --}}

@section('content')
    <div class="row">
        <div class="col-md-7">
            <color-box title="Pendientes de {{ $store->name }}" color="vks">

                <table id="example1" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Descripción</th>
                            <th style="text-align: center;">Cantidad</th>
                            <th style="text-align: center;">Precio</th>
                            <th style="text-align: center;">Importe</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($sales as $sale)
                        @foreach($sale->movements as $movement)
                            <tr>
                                <td>{{ $movement->supply->description }}</td>
                                <td style="text-align: center;">{{ $movement->quantity }}</td>
                                <td style="text-align: center;">{{ number_format($movement->price, 2) }}</td>
                                <td style="text-align: center;">{{ number_format($movement->quantity * $movement->price, 2) }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </color-box>
        </div>
        
    </div>
@endsection
