@extends('lte.root')

@push('pageTitle')
    Arqueo | Lista
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box color="primary" title="Arqueos">
                <data-table example="1">
                    {{ drawHeader('', 'fecha', 'corte', 'público S/IVA', 'efectivo', 'tarjetas', 'transfer y cheques', '') }}
                    <template slot="body">
                        @foreach($checkups as $checkup)
                            <tr>
                                <td>{{ $checkup->id }}</td>
                                <td>{{ fdate($checkup->date_sale,'d-M-Y', 'Y-m-d') }}</td>
                                <td>{{ fnumber($checkup->amount) }}</td>
                                <td>{{ fnumber($checkup->sale->public) }}</td>
                                <td>{{ fnumber($checkup->cash_sums['c']) }}<br><code>{{ $checkup->cash_sums['d'] > 10 || $checkup->cash_sums['d'] < -10 ? fnumber($checkup->cash_sums['d']) : ''  }}</code></td>
                                <td>{{ fnumber($checkup->card_sums['c']) }}<br><code>{{ $checkup->card_sums['d'] > 10 || $checkup->card_sums['d'] < -10 ? fnumber($checkup->card_sums['d']) : ''  }}</code></td>
                                <td>{{ fnumber($checkup->transfer_sums['c']) }}<br><code>{{ $checkup->transfer_sums['d'] > 10 || $checkup->transfer_sums['d'] < -10 ? fnumber($checkup->transfer_sums['d']) : ''  }}</code></td>
                                <td>
                                    <dropdown icon="cogs" color="{{ $checkup->store->color }}">
                                        <ddi to="{{ route('checkup.report', $checkup) }}" icon="file-pdf" text="Reporte"></ddi>
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
