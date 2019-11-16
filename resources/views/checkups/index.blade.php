@extends('lte.root')

@push('pageTitle')
    Arqueo
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box color="primary" title="Arqueos">
                <data-table example="1">
                    {{ drawHeader('fecha', 'Corte', 'Público S/IVA', 'Efectivo', '') }}
                    <template slot="body">
                        @foreach($checkups as $checkup)
                            <tr>
                                <td>{{ fdate($checkup->date_sale,'d-M-Y', 'Y-m-d') }}</td>
                                <td>{{ fnumber($checkup->amount) }}</td>
                                <td>{{ fnumber($checkup->cash_sums['c']) }}</td>
                                <td>{{ fnumber($checkup->sale->public) }}</td>
                                <td>
                                    <dropdown icon="cogs" color="{{ auth()->user()->store->color }}">
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
