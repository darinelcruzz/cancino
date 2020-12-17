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
            <color-box title="Ventas pendientes" color="vks" solid>

                <table id="example1" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th><i class="fa fa-cogs"></i></th>
                            <th>Captura</th>
                            <th>Tienda</th>
                            <th>Importe</th>
                            <th>Usuario</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($pending_sales as $supply_sale)
                            <tr>
                                <td>{{ $supply_sale->id }}</td>
                                <td>
                                    <dropdown icon="cogs" color="github">
                                        <ddi icon="eye" to="{{ route('supplies.sales.show', $supply_sale) }}" text="Ver"></ddi>
                                        <ddi icon="plus" to="{{ route('supplies.sales.edit', $supply_sale) }}" text="Agregar insumos"></ddi>
                                        <li>
                                            <a href="" data-toggle="modal" data-target="#modal-{{ $supply_sale->id }}"><i class="fa fa-usd"></i> Pagar</a>
                                        </li>
                                        @if(auth()->user()->level == 1 && $supply_sale->status != 'cancelada')
                                            <ddi icon="times" to="{{ route('supplies.sales.destroy', $supply_sale) }}" text="Cancelar"></ddi>
                                        @endif
                                    </dropdown>

                                    {!! Form::open(['method' => 'POST', 'route' => ['supplies.sales.pay', $supply_sale]]) !!}
                                        <modal title="Información de pago" id="modal-{{ $supply_sale->id }}" color="github">

                                                {!! Field::date('sold_at', date('Y-m-d'), ['label' => 'Fecha', 'tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}

                                                {!! Field::text('invoice', ['tpl' => 'lte/withicon', 'class' => 'pull-right'], ['icon' => 'file']) !!}

                                                <input type="hidden" name="status" value="pagada">

                                                <template slot="footer">
                                                    {!! Form::submit('Agregar', ['class' => 'btn btn-github pull-right']) !!}
                                                </template>
                                        </modal>
                                    {!! Form::close() !!}
                                </td>
                                <td>{{ $supply_sale->created_at }}</td>
                                <td>
                                    <a href="{{ route('supplies.sales.pending', $supply_sale->store) }}">
                                        {{ $supply_sale->store->name }}
                                    </a>
                                </td>
                                <td>{{ number_format($supply_sale->amount, 2) }}</td>
                                <td>{{ $supply_sale->user->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </color-box>
        </div>
        
    </div>


    <div class="row">
        <div class="col-md-12">
            <color-box title="Ventas pagadas" color="success" solid button collapsed>

                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 5%">ID</th>
                            <th style="width: 5%"><i class="fa fa-cogs"></i></th>
                            <th>Factura</th>
                            <th>Pago</th>
                            <th>Tienda</th>
                            <th>Importe</th>
                            <th>Usuario</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($paid_sales as $supply_sale)
                            <tr>
                                <td>{{ $supply_sale->id }}</td>
                                <td>
                                    <dropdown icon="cogs" color="success">
                                        <ddi icon="eye" to="{{ route('supplies.sales.show', $supply_sale) }}" text="Ver"></ddi>
                                        @if(auth()->user()->level == 1 && $supply_sale->status != 'cancelada')
                                            <ddi icon="times" to="{{ route('supplies.sales.destroy', $supply_sale) }}" text="Cancelar"></ddi>
                                        @endif
                                    </dropdown>
                                </td>
                                <td style="text-align: center;">{{ $supply_sale->invoice }}</td>
                                <td>{{ $supply_sale->sold_at }}</td>
                                <td>{{ $supply_sale->store->name }}</td>
                                <td>{{ number_format($supply_sale->amount, 2) }}</td>
                                <td>{{ $supply_sale->user->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </color-box>
        </div>
        
    </div>
@endsection
