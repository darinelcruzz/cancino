@extends('lte.root')

@push('pageTitle')
    Arqueo | Lista
@endpush

@push('headerTitle')
    <a href="{{ route('checkup.create') }}" class="btn btn-success"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;AGREGAR</a>
    <a href="{{ route('checkup.cards') }}" class="btn btn-{{ auth()->user()->store->color }}"><i class="fa fa-credit-card"></i>&nbsp;&nbsp;Terminales</a>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box color="{{ auth()->user()->store->color }}" title="Arqueos">
                <data-table example="1">
                    {{ drawHeader('', 'fecha', 'corte', 'público S/IVA', 'efectivo', 'tarjetas', 'transfer y cheques', 'crédito', 'web', 'otros', 'estado', '') }}
                    <template slot="body">
                        @foreach($checkups as $checkup)
                            <tr>
                                <td>{{ $checkup->id }}</td>
                                <td>{{ fdate($checkup->date_sale,'d-M-Y', 'Y-m-d') }}</td>
                                <td>{{ fnumber($checkup->amount + $checkup->sale->compensation) }}</td>
                                <td>{{ fnumber($checkup->sale->public) }}</td>
                                <td>{{ fnumber($checkup->cash_sums['c']) }} <br> {!! $checkup->cash_sums['d'] > 10 || $checkup->cash_sums['d'] < -10 ? '<code>' . fnumber($checkup->cash_sums['d']) : ''  !!}</code></td>
                                <td>{{ fnumber($checkup->card_sums['c']) }}<br> {!! $checkup->card_sums['d'] > 10 || $checkup->card_sums['d'] < -10 ? '<code>' . fnumber($checkup->card_sums['d']) : ''  !!}</code></td>
                                <td>{{ fnumber($checkup->transfer_sums['c']) }}<br> {!! $checkup->transfer_sums['d'] > 10 || $checkup->transfer_sums['d'] < -10 ? '<code>' . fnumber($checkup->transfer_sums['d']) : ''  !!}</code></td>
                                <td>{{ fnumber($checkup->creditSum) }} <br> {!! $checkup->canceledSum ? '<code> -' . fnumber($checkup->canceledSum) : '' !!}</code>
                                </td>
                                <td>{{ fnumber($checkup->online['web']??0) }}</td>
                                <td>
                                    {!! $checkup->retention != 0 ? '<b>Retención:</b> <br><code>' . fnumber($checkup->retention) . '</code><br>' : '' !!}
                                    {!! $checkup->sc_dif != 0 ? '<b>StrenCard:</b> <br><code>' . fnumber($checkup->sc_dif) . '</code>' : '' !!}
                                </td>

                                <td>{!! $checkup->statusLabel !!}</td>

                                <td>
                                    <dropdown icon="cogs" color="{{ $checkup->store->color }}">
                                        <li>
                                            <a href="{{ route('checkup.report', $checkup) }}" target="_blank">
                                                <i class="fa fa-file-pdf"></i>Reporte
                                            </a>
                                        </li>
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
