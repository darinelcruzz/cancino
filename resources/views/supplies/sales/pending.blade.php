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
                    
                    @foreach($sales as $sale)
                        @foreach($sale->movements as $movement)
                            @if(array_key_exists($movement->supply->id, $supplies))
                                @php
                                    $supplies[$movement->supply->id] += $movement->quantity;
                                @endphp
                            @else
                                @php
                                    $supplies[$movement->supply->id] = $movement->quantity;
                                @endphp
                            @endif
                        @endforeach
                    @endforeach

                    <tbody>

                    @foreach($sales as $sale)
                        @foreach($sale->movements as $movement)
                            @if(array_key_exists($movement->supply->id, $supplies2))
                                
                            @else
                                @php
                                    $supplies2[$movement->supply->id] = 1;
                                    $amount += $supplies[$movement->supply->id] * $movement->price;
                                @endphp
                                <tr>
                                    <td>{{ $movement->supply->description }}</td>
                                    <td style="text-align: center;">{{ $supplies[$movement->supply->id] }}</td>
                                    <td style="text-align: right;">{{ number_format($movement->price, 2) }}</td>
                                    <td style="text-align: right;">{{ number_format($supplies[$movement->supply->id] * $movement->price, 2) }}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <th colspan="2"></th>
                            <th style="text-align: right;"><em><b>Total</b></em></th>
                            <td style="text-align: right;">{{ number_format($amount, 2) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </color-box>
        </div>
        
    </div>
@endsection