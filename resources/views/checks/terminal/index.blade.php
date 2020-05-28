@extends('lte.root')

@push('pageTitle', 'Chequeras')

@section('content')
    @foreach ($stores->where('type', 'c')->first()->bank_accounts as $bank_account)
        <div class="row">
            <div class="col-md-12">
                <color-box title="{{ ucfirst($bank_account->type) }} ({{ $bank_account->checks->count() }})" color="{{ $bank_account->store->color }}" solid button collapsed>

                    <table class="table table-striped table-bordered ascending">
                        <thead>
                            <tr>
                                <th style="width: 5%">Folio</th>
                                <th style="width: 5%"><i class="fa fa-cogs"></i></th>
                                <th>Fecha</th>
                                <th>Monto</th>
                                <th>Concepto</th>
                                <th>Nombre</th>
                                <th>Proveedor</th>
                                <th>Observaciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($bank_account->checks as $check)
                                <tr style="{{ $check->account_movement->provider_id == 10 ? 'color: gray; text-decoration: line-through': '' }}">
                                    <td style="width: 5%">{{ $check->folio }}</td>
                                    <td style="width: 5%">
                                        <dropdown icon="cogs" color="github">
                                            <ddi to="{{ route('checks.policy', $check) }}" icon="file-pdf" text="Póliza"></ddi>
                                            @if ($check->account_movement->expenses_group_id == 7)
                                                <ddi to="{{ route('terminal.show', $check)}}" icon="eye" text="Detalles"></ddi>
                                            @endif
                                            @if (isAdmin() && $check->account_movement->provider_id != 10)
                                                <ddi to="{{ route('terminal.destroy', $check)}}" icon="times" text="Cancelar"></ddi>
                                            @endif
                                        </dropdown>
                                    </td>
                                    <td>{{ fdate($check->emitted_at, 'd M Y', 'Y-m-d') }}</td>
                                    <td style="text-align: right;">{{ number_format($check->amount, 2) }}</td>
                                    <td><small>{{ strtoupper($check->concept) }}</small></td>
                                    <td>{{ ucfirst($check->name) }}</td>
                                    <td>{{ ucfirst($check->account_movement->provider->social) }}</td>
                                    <td>{{ $check->observations }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    <a href="{{ route('terminal.create', $bank_account) }}" class="btn btn-github btn-xs btn-block">AGREGAR</a>
                </color-box>
            </div>
        </div>
    @endforeach

    @foreach ($stores->where('type', '!=', 'c') as $store)
        <div class="row">
            <div class="col-md-12">
                <color-box title="{{ ucfirst($store->name) }} ({{ $store->terminal_account->checks->count() }})" color="{{ $store->color }}" solid button collapsed>

                    <table class="table table-striped table-bordered ascending">
                        <thead>
                            <tr>
                                <th style="width: 5%">Folio</th>
                                <th style="width: 5%"><i class="fa fa-cogs"></i></th>
                                <th>Fecha</th>
                                <th>Monto</th>
                                <th>Concepto</th>
                                <th>Nombre</th>
                                <th>Proveedor</th>
                                <th>Observaciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($store->terminal_account->checks as $check)
                                <tr style="{{ $check->account_movement->provider_id == 10 ? 'color: gray; text-decoration: line-through': '' }}">
                                    <td style="width: 5%">{{ $check->folio }}</td>
                                    <td style="width: 5%">
                                        <dropdown icon="cogs" color="{{ $store->color }}">
                                            <ddi to="{{ route('checks.policy', $check) }}" icon="file-pdf" text="Póliza"></ddi>
                                            @if ($check->account_movement->expenses_group_id == 7)
                                                <ddi to="{{ route('terminal.show', $check)}}" icon="eye" text="Detalles"></ddi>
                                            @endif
                                            @if (isAdmin() && $check->account_movement->provider_id != 10)
                                                <ddi to="{{ route('terminal.destroy', $check)}}" icon="times" text="Cancelar"></ddi>
                                            @endif
                                        </dropdown>
                                    </td>
                                    <td>{{ fdate($check->emitted_at, 'd M Y', 'Y-m-d') }}</td>
                                    <td style="text-align: right;">{{ number_format($check->amount, 2) }}</td>
                                    <td><small>{{ strtoupper($check->concept) }}</small></td>
                                    <td>{{ ucfirst($check->name) }}</td>
                                    <td>{{ ucfirst($check->account_movement->provider->social) }}</td>
                                    <td>{{ $check->observations }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    <a href="{{ route('terminal.create', $store->terminal_account) }}" class="btn btn-{{ $store->color }} btn-xs btn-block">AGREGAR</a>
                </color-box>
            </div>
        </div>
    @endforeach
@endsection