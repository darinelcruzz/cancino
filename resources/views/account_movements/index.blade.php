@extends('lte.root')

@push('pageTitle', 'Movimientos | Lista')

@push('headerTitle')
    <a href="{{ route('account_movements.create') }}" class="btn btn-primary btn-sm">
        <i class="fa fa-plus-square"></i>&nbsp;&nbsp;AGREGAR
    </a>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box color="primary" title="Movimientos de cuentas">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><i class="fa fa-hashtag"></i></th>
                            <th><i class="fa fa-cogs"></i></th>
                            <th>Fecha</th>
                            <th>Cuenta</th>
                            <th>Concepto</th>
                            <th>Monto</th>
                            <th>Tipo</th>
                            <th>Proveedor</th>
                            <th>Grupo</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($movements as $movement)
                            <tr>
                                <td>{{ $movement->id }}</td>
                                <td>
                                    <dropdown icon="cogs" color="primary">
                                        <ddi to="{{ route('account_movements.edit', $movement) }}" icon="edit" text="Editar"></ddi>
                                    </dropdown>
                                </td>
                                <td>{{ $movement->added_at }}</td>
                                <td>{{ $movement->bank_account->number }}</td>
                                <td>{{ $movement->concept }}</td>
                                <td>{{ number_format($movement->amount, 2) }}</td>
                                <td>{{ ucfirst($movement->type) }}</td>
                                <td>{{ $movement->provider->social }}</td>
                                <td>{{ $movement->expenses_group->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </color-box>
        </div>
    </div>

@endsection
