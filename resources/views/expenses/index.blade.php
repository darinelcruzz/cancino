@extends('lte.root')
@push('pageTitle')
    Gastos | Lista
@endpush

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="col-md-12">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h4><b>Saldo</b></h4>
                        <h3 align="center"><b>{{ fnumber(auth()->user()->store->balance) }}</b></h3>
                        <h4 align="center">{{ fdate(auth()->user()->store->updated_at,'d/M/Y') }}</h4>
                    </div>
                    <div class="icon">
                        <i class="fa fa-dollar"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <color-box title="Agregar" color="danger" button collapsed>
                    <div class="col-md-12">
                        {!! Field::date('date', ['tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                    </div>
                    <div class="col-md-12">
                        {!! Field::number('check', ['tpl' => 'lte/withicon', 'min' => '0'], ['icon' => 'pencil']) !!}
                    </div>
                    <div class="col-md-12">
                        {!! Field::number('amount', ['tpl' => 'lte/withicon', 'min' => '0'], ['icon' => 'pencil']) !!}
                    </div>
                    <div class="col-md-12">
                        {!! Field::text('concept', ['tpl' => 'lte/withicon'], ['icon' => 'pencil']) !!}
                    </div>
                    <div class="col-md-12">
                        {!! Field::text('description', ['tpl' => 'lte/withicon'], ['icon' => 'pencil']) !!}
                    </div>
                </color-box>
            </div>
        </div>
        <div class="col-md-9">
                <color-box title="Gastos" color="primary">
                    <data-table example="1">
                        {{ drawHeader('ID', 'Cheque','Fecha', 'Monto', 'Concepto', 'Descripcion') }}

                        <template slot="body">
                            @foreach($expenses as $expense)
                                <tr>
                                    <td>{{ $expense->id }}</td>
                                    <td>{{ $expense->check }}</td>
                                    <td>{{ fdate($expense->date, 'd M Y', 'Y-m-d') }}</td>
                                    <td>{{ fnumber($expense->amount) }}</td>
                                    <td>{{ $expense->concept }}</td>
                                    <td>{{ $expense->description }}</td>
                                </tr>
                            @endforeach
                        </template>
                    </data-table>
                </color-box>
        </div>
    </div>
@endsection
