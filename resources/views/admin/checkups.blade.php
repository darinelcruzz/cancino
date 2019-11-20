@extends('lte.root')
@push('pageTitle')
    Arqueo | Lista
@endpush

@push('headerTitle')
    <a href="{{ route('notes.create') }}" class="btn btn-success btn-xs"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;AGREGAR</a>
@endpush

@section('content')
    @foreach ($stores as $store)
        <div class="row">
            <div class="col-md-12">
                <color-box title="{{ $store->name }}" color="{{ $store->color }}" button collapsed>
                    <data-table example="{{ $store->id }}">
                        {{ drawHeader('', 'fecha', 'corte', 'público S/IVA', 'efectivo', 'tarjetas', 'transfer y cheques', '') }}
                        <template slot="body">
                            @foreach($checkups as $checkup)
                                @if ($checkup->store_id == $store->id)
                                    <tr>
                                        <td>{{ $checkup->id }}</td>
                                        <td>{{ fdate($checkup->date_sale,'d-M-Y', 'Y-m-d') }}</td>
                                        <td>{{ fnumber($checkup->amount) }}</td>
                                        <td>{{ fnumber($checkup->sale->public) }}</td>
                                        <td>{{ fnumber($checkup->cash_sums['c']) }}</td>
                                        <td>{{ fnumber($checkup->card_sums['c']) }}</td>
                                        <td>{{ fnumber($checkup->transfer_sums['c']) }}</td>
                                        <td>
                                            <dropdown icon="cogs" color="{{ $checkup->store->color }}">
                                                <ddi to="{{ route('checkup.report', $checkup) }}" icon="file-pdf" text="Reporte"></ddi>
                                            </dropdown>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </template>
                    </data-table>
                </color-box>
            </div>
        </div>
    @endforeach
@endsection
