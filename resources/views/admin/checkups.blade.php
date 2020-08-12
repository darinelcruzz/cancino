@extends('lte.root')
@push('pageTitle')
    Arqueo | Lista
@endpush

@section('content')
    @foreach ($stores as $store)
        <div class="row">
            <div class="col-md-12">
                <color-box title="{{ $store->name }}" color="{{ $store->color }}" label="{{ $checkups->where('store_id', $store->id)->where('status', '<', 2)->count() }}" button collapsed>
                    <data-table example="{{ $store->id }}">
                        {{ drawHeader('', 'fecha', 'corte', 'público S/IVA', 'efectivo', 'tarjetas', 'transfer y cheques', 'crédito', 'web', 'Otros', 'estado', '') }}
                        <template slot="body">
                            @foreach($checkups as $checkup)
                                @if ($checkup->store_id == $store->id)
                                    <tr>
                                        <td>{{ $checkup->id }}</td>
                                        <td>{{ fdate($checkup->date_sale,'d-M-Y', 'Y-m-d') }}</td>
                                        <td>{{ fnumber($checkup->amount) }}</td>
                                        <td>{{ fnumber($checkup->sale->public) }}</td>
                                        <td>{{ fnumber($checkup->cash_sums['c']) }} <br> {!! $checkup->cash_sums['d'] > 10 || $checkup->cash_sums['d'] < -10 ? '<code>' . fnumber($checkup->cash_sums['d']) : ''  !!}</code></td>
                                        <td>{{ fnumber($checkup->card_sums['c']) }}<br> {!! $checkup->card_sums['d'] > 10 || $checkup->card_sums['d'] < -10 ? '<code>' . fnumber($checkup->card_sums['d']) : ''  !!}</code></td>
                                        <td>{{ fnumber($checkup->transfer_sums['c']) }}<br> {!! $checkup->transfer_sums['d'] > 10 || $checkup->transfer_sums['d'] < -10 ? '<code>' . fnumber($checkup->transfer_sums['d']) : ''  !!}</code></td>
                                        <td>{{ fnumber($checkup->creditSum) }} <br> {!! $checkup->canceledSum ? '<code> -' . fnumber($checkup->canceledSum) : '' !!}</code></td>
                                        <td>{{ fnumber($checkup->online['web']) }}</td>
                                        <td>
                                            {!! $checkup->retention != 0 ? '<b>Retención:</b> <br><code>' . fnumber($checkup->retention) . '</code><br>' : '' !!}
                                            {!! $checkup->sc_dif != 0 ? '<b>StrenCard:</b> <br><code>' . fnumber($checkup->sc_dif) . '</code>' : '' !!}
                                        </td>
                                        <td>{!! $checkup->statusLabel !!}</td>
                                        <td>
                                            <dropdown icon="cogs" color="{{ $checkup->store->color }}">
                                                <ddi to="{{ route('checkup.report', $checkup) }}" icon="file-pdf" text="Reporte"></ddi>
                                                @if (auth()->user()->level==1)
                                                    <ddi to="{{ route('checkup.edit', $checkup) }}" icon="edit" text="Editar arqueo"></ddi>
                                                    <ddi to="{{ route('sales.edit', $checkup->sale) }}" icon="edit" text="Editar venta"></ddi>
                                                @endif
                                                @if ($checkup->status < 2)
                                                    <ddi to="{{ route('checkup.updateStatus', ['checkup' => $checkup, 'status' => '2']) }}" icon="check" text="Verificada"></ddi>
                                                @endif
                                                @if ($checkup->status == 0)
                                                    <ddi to="{{ route('checkup.updateStatus', ['checkup' => $checkup, 'status' => '1']) }}" icon="times" text="Error"></ddi>
                                                @endif
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
