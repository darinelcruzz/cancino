@extends('lte.root')

@push('pageTitle', 'Cheques | Lista')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h4 align="center"><b>Saldo</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>CH:</b>{{ $last ? $last->folio + 1: 1 }}</h4>
                            <h3 align="center"><b>{{ fnumber($balance) }}</b></h3>
                            {{-- <h4 align="center">{{ fdate($last->date,'d/M/Y', 'Y-m-d') }}</h4> --}}
                        </div>
                        <div class="icon">
                            <i class="fa fa-dollar"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('checks.create', $store) }}" class="btn btn-success btn-block"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Agregar</a><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <color-box title="Transferencias" color="primary">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Monto</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($movements as $movement)
                                    <tr>
                                        <td>{{ fdate($movement->added_at, 'd M Y', 'Y-m-d') }}</td>
                                        <td>{{ number_format($movement->amount, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </color-box>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <color-box title="Caja chica" color="primary">
                        <table class="table table-bordered">
                            <tbody>
                                    <tr>
                                        <th>Gastos</td>
                                        <td>$ {{ number_format($store->expense, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Cambio</td>
                                        <td>$ {{ number_format($store->cash, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <th><b>Total</b></td>
                                        <td><b>$ {{ number_format($store->cash + $store->expense, 2) }}</b></td>
                                    </tr>
                            </tbody>
                        </table>
                    </color-box>
                </div>
            </div>

        </div>
        <div class="col-md-9">
            <color-box title="Gastos" color="primary">
                <data-table example="1">
                    {{ drawHeader('folio', '<i class="fa fa-cogs"></i>', 'Fecha', 'Monto', 'Concepto', 'Observaciones') }}

                    <template slot="body">
                        @foreach($checks as $check)
                            <tr style="{{ $check->account_movement->provider_id == 10 ? 'color: gray; text-decoration: line-through': '' }}">
                                <td>{{ $check->folio }}</td>
                                <td>
                                    <dropdown icon="cogs" color="{{ auth()->user()->store->color != 'vks' ?? 'github' }}">
                                        <ddi to="{{ route('checks.policy', $check) }}" icon="file-pdf" text="Póliza" target="_blank"></ddi>
                                        @if ($check->account_movement->expenses_group_id == 7)
                                            <ddi to="{{ route('checks.show', $check)}}" icon="eye" text="Detalles"></ddi>
                                        @endif
                                        @if (isAdmin() && $check->account_movement->provider_id != 10)
                                            <ddi to="{{ route('checks.destroy', $check)}}" icon="times" text="Cancelar"></ddi>
                                        @endif
                                    </dropdown>
                                </td>
                                <td>{{ fdate($check->emitted_at, 'd/F/Y', 'Y-m-d') }}</td>
                                <td>{{ number_format($check->amount, 2) }}</td>
                                <td>{{ $check->concept }} <br>  <code>{{ $check->group }}</code></td>
                                <td>{{ $check->observations }}</td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
    </div>
@endsection
