@extends('lte.root')

@push('pageTitle', 'Insumos | Compras')

@push('headerTitle')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('supplies.purchases.create') }}" class="btn btn-github btn-xs pull-left">
                <i class="fa fa-plus-square"></i>&nbsp;&nbsp;AGREGAR
            </a>
        </div>
    </div>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Compras de insumos" color="vks">

                <div class="table-responsive">
                    <table id="example1" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th><i class="fa fa-cogs"></i></th>
                            <th>Fecha</th>
                            <th>Proveedor</th>
                            <th>Importe</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($supply_purchases as $supply_purchase)
                            <tr>
                                <td>{{ $supply_purchase->id }}</td>
                                <td>
                                    <dropdown icon="cogs" color="github">
                                        <ddi icon="eye" to="{{ route('supplies.purchases.show', $supply_purchase) }}" text="Ver"></ddi>
                                        @if(isAdmin() || auth()->user()->isHelper)
                                            <ddi icon="edit" to="{{ route('supplies.purchases.edit', $supply_purchase) }}" text="Editar"></ddi>
                                        @endif
                                    </dropdown>
                                </td>
                                <td>{{ fdate($supply_purchase->purchased_at, 'd-M-y', 'Y-m-d') }}</td>
                                <td>
                                    <code>{{ $supply_purchase->provider->business }}</code><br>
                                    {{ $supply_purchase->provider->social }}
                                </td>
                                <td>{{ number_format($supply_purchase->amount, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </color-box>
        </div>

    </div>
@endsection
