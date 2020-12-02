@extends('lte.root')

@push('pageTitle', 'Movimientos')

@push('headerTitle')
    <div class="row">
        <div class="col-md-3">
            {!! Form::open(['method' => 'post', 'route' => ['bank_accounts.show', $bank_account]]) !!}
                <div class="input-group input-group-sm">
                    <input type="month" name="date" class="form-control" value="{{ $date }}">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-{{ $bank_account->store_id == 1 ? 'github':  $bank_account->store->color }} btn-flat"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            {!! Form::close() !!}
        </div>
        <div class="col-md-9">
            <a href="{{ route('stores.index') }}" class="pull-right btn btn-sm btn-primary">
                <i class="fa fa-angle-double-left"></i>&nbsp;&nbsp;REGRESAR
            </a>
        </div>
    </div>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Movimientos de la cuenta ...{{ substr($bank_account->number, -4) }}" color="{{ $bank_account->store->color }}">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered  descending">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th><i class="fa fa-cogs"></i></th>
                                <th>Concepto</th>
                                <th>Monto</th>
                                <th>Tipo</th>
                                <th>Proveedor</th>
                                <th>Grupo</th>
                                <th>Observaciones</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($movements as $movement)
                                <tr>
                                    <td style="width: 10%">{{ $movement->added_at }}</td>
                                    <td>
                                        <dropdown icon="cogs" color="{{ $bank_account->store_id == 1 ? 'github':  $bank_account->store->color }}">
                                            <ddi to="{{ route('account_movements.edit', $movement) }}" icon="edit" text="Editar"></ddi>
                                        </dropdown>
                                    </td>
                                    <td>{{ $movement->concept }} {{ $movement->check_id ? ' / ' . $movement->check->folio . ' / ' . $movement->check->concept : '' }}</td>
                                    <td>{{ number_format($movement->amount, 2) }}</td>
                                    <td>{{ ucfirst($movement->type) }}</td>
                                    <td>{!! $movement->provider->social ?? '<code>PENDIENTE</code>' !!}</td>
                                    <td>{!! $movement->expenses_group->name ?? '<code>PENDIENTE</code>' !!}</td>
                                    <td>{{ $movement->check->observations ?? ($movement->observations ?? 'Ninguna') }}</td>
                                </tr>
                            @endforeach
                            <tfoot>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><b>Abonos</b></td>
                                <td><b>{{ fnumber($movements->where('type', 'abono')->sum('amount')) }}</b></td>
                                <td><b>Cargo</b></td>
                                <td><b>{{ fnumber($movements->where('type', 'cargo')->sum('amount')) }}</b></td>
                            </tfoot>
                        </tbody>

                    </table>
                </div>
            </color-box>
        </div>
    </div>

@endsection
