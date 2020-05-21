@extends('lte.root')

@push('pageTitle', 'Movimientos')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box color="{{ $bank_account->store->color }}" title="Movimientos de la cuenta ...{{ substr($bank_account->number, -4) }}">
                <table class="table table-striped table-bordered ascending">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th><i class="fa fa-cogs"></i></th>
                            <th>Concepto</th>
                            <th>Monto</th>
                            <th>Tipo</th>
                            <th>Proveedor</th>
                            <th>Grupo</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $movements = auth()->user()->level <= 2 ? $bank_account->account_movements: $bank_account->pending_movements
                        @endphp

                        @foreach($movements as $movement)
                            <tr>
                                <td style="width: 10%">{{ $movement->added_at }}</td>
                                <td>
                                    <dropdown icon="cogs" color="{{ $bank_account->store_id == 1 ? 'github':  $bank_account->store->color }}">
                                        <ddi to="{{ route('account_movements.edit', $movement) }}" icon="edit" text="Editar"></ddi>
                                    </dropdown>
                                </td>
                                <td>{{ $movement->concept }}{{ $movement->check_id ? ' / ' . $movement->check->concept : '' }}</td>
                                <td>{{ number_format($movement->amount, 2) }}</td>
                                <td>{{ ucfirst($movement->type) }}</td>
                                <td>{{ $movement->provider->social or 'Pendiente' }}</td>
                                <td>{{ $movement->expenses_group->name or 'Pendiente' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </color-box>
        </div>
    </div>

@endsection
