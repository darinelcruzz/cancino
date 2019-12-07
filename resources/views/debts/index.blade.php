@extends('lte.root')
@push('pageTitle')
    Deudas | Lista
@endpush

@if (auth()->user()->level == 1)
    @push('headerTitle')
        <a href="{{ route('debts.create') }}" class="btn btn-success btn-xs"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Agregar</a>
    @endpush
@endif

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Pendientes" color="danger">
                <data-table example="1">
                    {{ drawHeader('ID','Empleado', 'Tienda', 'Duda', 'Pendiente', '<i class="fa fa-cogs"></i>') }}

                    <template slot="body">
                        @foreach($debts->where('status', 'pendiente') as $debt)
                            <tr>
                                <td>{{ $debt->id }}</td>
                                <td>{{ $debt->employer->name }}</td>
                                <td>{{ $debt->store->name }}</td>
                                <td>{{ fnumber($debt->amount) }}</td>
                                <td>{{ fnumber($debt->difference) }}</td>
                                <td>
                                    <dropdown icon="cogs" color="{{ auth()->user()->store->color }}">
                                        <ddi to="{{ route('payments.create', ['id' => $debt->id]) }}" icon="plus" text="Abonar"></ddi>
                                        <ddi to="{{ route('debts.show', ['id' => $debt->id]) }}" icon="eye" text="Abonos"></ddi>
                                        {{-- <ddi icon="eye" text="Abonos" target="{{ $debt->id }}"></ddi>
                                        @include('templates/paymentsModal') --}}
                                    </dropdown>
                                </td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </solid-box>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <color-box title="Pagados" color="success" collapsed button>
                <data-table example="2">
                    {{ drawHeader('ID','Empleado', 'Tienda', 'Duda', 'Pendiente', '<i class="fa fa-cogs"></i>') }}

                    <template slot="body">
                        @foreach($debts->where('status', 'pagado') as $debt)
                            <tr>
                                <td>{{ $debt->id }}</td>
                                <td>{{ $debt->employer->name }}</td>
                                <td>{{ $debt->store->name }}</td>
                                <td>{{ fnumber($debt->amount) }}</td>
                                <td>{{ fnumber($debt->difference) }}</td>
                                <td>
                                    <dropdown icon="cogs" color="{{ auth()->user()->store->color }}">
                                        <ddi to="{{ route('debts.show', ['id' => $debt->id]) }}" icon="eye" text="Abonos"></ddi>
                                    </dropdown>
                                </td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </solid-box>
        </div>
    </div>
@endsection
