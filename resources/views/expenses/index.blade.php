@extends('lte.root')
@push('pageTitle')
    Gastos | Lista
@endpush

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h4 align="center"><b>Saldo</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>CH:</b>{{ $last->check + 1 }}</h4>
                            <h3 align="center"><b>{{ fnumber(App\Expense::balanceByStore($store->id)) }}</b></h3>
                            <h4 align="center">{{ fdate($last->date,'d/M/Y', 'Y-m-d') }}</h4>
                        </div>
                        <div class="icon">
                            <i class="fa fa-dollar"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('expenses.create', 0) }}" class="btn btn-success btn-block"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Agregar</a><br>
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
                                @foreach ($ingreses as $ingres)
                                    <tr>
                                        <td>{{ fdate($ingres->date, 'd M Y', 'Y-m-d') }}</td>
                                        <td>{{ fnumber($ingres->amount) }}</td>
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
                                        <td>{{ fnumber($store->expense) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Cambio</td>
                                        <td>{{ fnumber($store->cash) }}</td>
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
                    {{ drawHeader('CH','Fecha', 'Monto', 'Concepto', 'Observaciones', '') }}

                    <template slot="body">
                        @foreach($expenses as $expense)
                            <tr>
                                <td>{{ $expense->check }}</td>
                                <td>{{ fdate($expense->date, 'd M Y', 'Y-m-d') }}</td>
                                <td>{{ fnumber($expense->amount) }}</td>
                                <td>{{ $expense->concept }} <br>  <code>{{ $expense->group }}</code></td>
                                <td>{{ $expense->observations }}</td>
                                <td>
                                    <dropdown icon="cogs" color="{{ auth()->user()->store->color }}">
                                        <ddi to="{{ route('expenses.policy', $expense) }}" icon="file-pdf" text="Póliza"></ddi>
                                        @if ($expense->group == 'Otros gastos')
                                            <ddi to="{{ route('expenses.show', $expense)}}" icon="eye" text="Detalles"></ddi>
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
