@extends('lte.root')

@push('pageTitle', 'Facturas de insumos | Agregar')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <color-box title="Agregar nueva factura" color="vks">

                {!! Form::open(['method' => 'POST', 'route' => 'supplies.invoices.store']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::text('folio', ['tpl' => 'lte/withicon'], ['icon' => 'barcode', 'placeholder' => 'X0X0X0X']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::date('invoiced_at', date('Y-m-d'), ['label' => 'Fecha', 'tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                            <input type="hidden" name="store_id" value="{{ $store->id }}">
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th><small>CLAVE</small></th>
                                            <th><i class="fa fa-check"></i></th>
                                            <th><small>DESCRIPCIÓN</small></th>
                                            <th style="text-align: center;"><small>UNIDAD</small></th>
                                            <th style="text-align: center;"><small>CANTIDAD</small></th>
                                            <th style="text-align: center;"><small>PRECIO</small></th>
                                            <th style="text-align: center;"><small>IMPORTE</small></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($movements->sortBy('supply_id') as $movement)
                                        <tr>
                                            <td>{{ $movement->supply->sat_key }}</td>
                                            <td>
                                                <input type="checkbox" name="items[{{ $loop->index }}][id]" value="{{ $movement->id }}">
                                            </td>
                                            <td>{{ $movement->description ?? $movement->supply->description  }}</td>
                                            <td style="text-align: center;"><small>{{ strtoupper($movement->supply->unit) }}</small></td>
                                            <td style="text-align: center;">{{ $movement->quantity * $movement->ratio }}</td>
                                            <td style="text-align: right;">{{ number_format($movement->price/1.16, 2) }}</td>
                                            <td style="text-align: right;">{{ number_format($movement->price/1.16 * $movement->quantity * $movement->ratio, 2) }}</td>
                                        </tr>                        
                                        @endforeach
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th colspan="6" style="text-align: right;"><small>TOTAL</small></th>
                                            <th style="text-align: right;">{{ number_format($movements->sum(function ($m) { return $m->price/1.16 * $m->quantity * $m->ratio; }), 2) }}</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>                    

                    <hr>

                    {!! Form::submit('A G R E G A R', ['class' => 'btn btn-github pull-right']) !!}

                {!! Form::close() !!}
            </color-box>
        </div>
        
    </div>
@endsection
