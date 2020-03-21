@extends('lte.root')

@push('pageTitle')
    Gastos | Agregar
@endpush

@section('content')
    @foreach ($stores as $store)
        <div class="row">
            <div class="col-md-12">
                <color-box title="{{ $store->name }}" color="{{ $store->color }}" button collapsed>
                    <data-table example="{{ $store->id }}">
                        {{ drawHeader('CH','Fecha', 'Monto', 'Concepto', 'Observaciones', '') }}
                        <template slot="body">
                            @foreach($expenses as $expense)
                                @if ($expense->store_id == $store->id)
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
                                @endif
                            @endforeach
                        </template>
                    </data-table>
                    <a href="{{ route('expenses.create', $store->id) }}" class="btn btn-xs btn-success btn-block"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;AGREGAR</a>
                </color-box>
            </div>
        </div>
    @endforeach
@endsection
