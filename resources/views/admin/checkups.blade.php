@extends('lte.root')
@push('pageTitle')
    Arqueo | Lista
@endpush

@section('content')
    @foreach ($stores as $store)
        <div class="row">
            <div class="col-md-12">
                <color-box title="{{ $store->name }}" color="{{ $store->color }}" label="{{ $checkups->where('store_id', $store->id)->whereIn('status', [0,1,4])->count() }}" button collapsed>
                    <data-table example="{{ $store->id }}">
                        {{ drawHeader('', 'fecha', 'corte', 'público S/IVA', 'efectivo', 'tarjetas', 'transfer y cheques', 'crédito', 'web', 'Otros', 'estado', '') }}
                        <template slot="body">
                            @foreach($checkups as $checkup)
                                @if ($checkup->store_id == $store->id)
                                    <tr>
                                        <td>{{ $checkup->id }}</td>
                                        <td>{{ fdate($checkup->date_sale,'d-M-Y', 'Y-m-d') }}</td>
                                        <td>{{ fnumber($checkup->amount + $checkup->sale->compensation) }}</td>
                                        <td>{{ $checkup->sale ? fnumber($checkup->sale->public): 'No se guardó' }}</td>
                                        <td>{{ fnumber($checkup->cash_sums['c']) }} <br> {!! $checkup->cash_sums['d'] > 5 || $checkup->cash_sums['d'] < -5 ? '<code>' . fnumber($checkup->cash_sums['d']) : ''  !!}</code></td>
                                        <td>{{ fnumber($checkup->card_sums['c']) }}<br> {!! $checkup->card_sums['d'] > 5 || $checkup->card_sums['d'] < -5 ? '<code>' . fnumber($checkup->card_sums['d']) : ''  !!}</code></td>
                                        <td>{{ fnumber($checkup->transfer_sums['c']) }}<br> {!! $checkup->transfer_sums['d'] > 5 || $checkup->transfer_sums['d'] < -5 ? '<code>' . fnumber($checkup->transfer_sums['d']) : ''  !!}</code></td>
                                        <td>{{ fnumber($checkup->creditSum) }} <br> {!! $checkup->canceledSum ? '<code> -' . fnumber($checkup->canceledSum) : '' !!}</code></td>
                                        <td>{{ fnumber($checkup->online['web']??0) }}</td>
                                        <td>
                                            {!! $checkup->retention != 0 ? '<b>Retención:</b> <br><code>' . fnumber($checkup->retention) . '</code><br>' : '' !!}
                                            {!! $checkup->sc_dif != 0 ? '<b>StrenCard:</b> <br><code>' . fnumber($checkup->sc_dif) . '</code>' : '' !!}
                                        </td>
                                        <td>{!! $checkup->statusLabel !!}</td>
                                        <td>
                                            <dropdown icon="cogs" color="{{ $checkup->store->color }}">
                                                {{-- <ddi to="{{ route('checkup.report', $checkup) }}" icon="file-pdf" text="Reporte"></ddi> --}}
                                                <li>
                                                    <a href="{{ route('checkup.report', $checkup) }}" target="_blank">
                                                        <i class="fa fa-file-pdf"></i>Reporte
                                                    </a>
                                                </li>
                                                @if (auth()->user()->level==1)
                                                    <ddi to="{{ route('checkup.edit', $checkup) }}" icon="edit" text="Editar arqueo"></ddi>
                                                    <ddi to="{{ route('sales.edit', $checkup->sale) }}" icon="edit" text="Editar venta"></ddi>
                                                @endif
                                                @if ($checkup->status < 2)
                                                    <ddi to="{{ route('checkup.updateStatus', ['checkup' => $checkup, 'status' => '2']) }}" icon="check" text="Verificada"></ddi>
                                                @endif
                                                @if ($checkup->status == 0)
                                                <li>
                                                    <a href="{{ route('checkup.report', $checkup) }}" target="_blank">
                                                        <i class="fa fa-file-pdf"></i>Reporte
                                                    </a>                                                    
                                                </li>
                                                <li>
                                                    <a type="button" data-toggle="modal" data-target="#errormodal{{ $checkup->id }}"><i class="fa fa-times"></i> Error</a>
                                                </li>
                                                    {{-- <ddi to="{{ route('checkup.updateStatus', ['checkup' => $checkup, 'status' => '1']) }}" icon="times" text="Error"></ddi> --}}
                                                @endif
                                            </dropdown>

                                            {!! Form::open(['method' => 'POST', 'route' => ['checkup.updateStatus',  [$checkup, 1]]]) !!}
                                            <modal id="errormodal{{ $checkup->id }}" title="Error en arqueo">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {!! Field::textarea('error', ['label' => 'Descripción del error', 'tpl' => 'lte/withicon', 'rows' => '2', 'cols' => '100'], ['icon' => 'comments']) !!}
                                                    </div>
                                                </div>
                                                <template slot="footer">
                                                    <button type="submit" class="btn btn-success pull-right">GUARDAR</button>
                                                </template>
                                            </modal>
                                            {!! Form::close() !!}
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
