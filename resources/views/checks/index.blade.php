@extends('lte.root')

@push('pageTitle', 'Cheques/Gastos | Lista')

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
                    <a href="{{ route('checks.create', getStore()) }}" class="btn btn-success btn-block"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Agregar</a><br>
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
                                        <td>{{ number_format(getStore()->expense, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Cambio</td>
                                        <td>{{ number_format(getStore()->cash, 2) }}</td>
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
                    {{ drawHeader('folio','Fecha', 'Monto', 'Concepto', 'Observaciones', '') }}

                    <template slot="body">
                        @foreach($checks as $check)
                            <tr>
                                <td>{{ $check->folio }}</td>
                                <td>{{ fdate($check->emitted_at, 'd/F/Y', 'Y-m-d') }}</td>
                                <td>{{ number_format($check->amount, 2) }}</td>
                                <td>{{ $check->concept }} <br>  <code>{{ $check->group }}</code></td>
                                <td>{{ $check->observations }}</td>
                                <td>
                                    <dropdown icon="cogs" color="{{ auth()->user()->store->color }}">
                                        <ddi to="{{ route('checks.policy', $check) }}" icon="file-pdf" text="Póliza"></ddi>
                                        @if ($check->group == 'Otros gastos')
                                            <ddi to="{{ route('checks.show', $expense)}}" icon="eye" text="Detalles"></ddi>
                                        @endif
                                    </dropdown>
                                </td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
    </div>
@endsection
