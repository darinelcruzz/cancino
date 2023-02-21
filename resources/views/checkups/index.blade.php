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
                <div class="table-responsive">
                    <table id="example1" class="table table-striped table-bordered table-hover table-condensed">
                        <thead>
                            <tr>
                                <th><small>ID</small></th>
                                <th><i class="fa fa-cogs"></i></th>
                                <th><small>FECHA</small></th>
                                <th><small>CORTE</small></th>
                                <th><small>PÚBLICO S/IVA</small></th>
                                <th><small>EFECTIVO</small></th>
                                <th><small>TARJETAS</small></th>
                                <th><small>TRANS|cheques</small></th>
                                <th><small>CRÉDITO</small></th>
                                <th><small>WEB</small></th>
                                <th><small>NOTAS</small></th>
                                <th><small>OTROS</small></th>
                                <th><small>ESTADO</small></th>
                            </tr>
                        </thead>
                        
                        <tbody>
                           @foreach($checkups as $checkup)
                                <tr>
                                    <td>{{ $checkup->id }}</td>
                                    <td>
                                        <dropdown icon="cogs" color="{{ $checkup->store->color }}">
                                            <li>
                                                <a href="{{ route('checkup.report', $checkup) }}" target="_blank">
                                                    <i class="fa fa-file-pdf"></i>Reporte
                                                </a>
                                            </li>
                                            @if($checkup->status == 4)
                                                <ddi icon="edit" text="Editar" to="{{ route('checkup.edit', $checkup) }}"></ddi>
                                            @endif
                                            @if($checkup->status == 4)
                                                <ddi icon="check" text="Completado" to="{{ route('checkup.updateStatus', [$checkup, 0]) }}"></ddi>
                                            @endif
                                        </dropdown>
                                    </td>
                                    <td>{{ fdate($checkup->date_sale,'d-M-Y', 'Y-m-d') }}</td>
                                    <td>{{ fnumber($checkup->amount + $checkup->sale->compensation) }}</td>
                                    <td>{{ fnumber($checkup->sale->public) }}</td>
                                    <td>{{ fnumber($checkup->cash_sums['c']) }} <br> {!! $checkup->cash_sums['d'] > 10 || $checkup->cash_sums['d'] < -10 ? '<code>' . fnumber($checkup->cash_sums['d']) : ''  !!}</code></td>
                                    <td>{{ fnumber($checkup->card_sums['c']) }}<br> {!! $checkup->card_sums['d'] > 10 || $checkup->card_sums['d'] < -10 ? '<code>' . fnumber($checkup->card_sums['d']) : ''  !!}</code></td>
                                    <td>{{ fnumber($checkup->transfer_sums['c']) }}<br> {!! $checkup->transfer_sums['d'] > 10 || $checkup->transfer_sums['d'] < -10 ? '<code>' . fnumber($checkup->transfer_sums['d']) : ''  !!}</code></td>
                                    <td>{{ fnumber($checkup->creditSum) }} <br> {!! $checkup->canceledSum ? '<code> -' . fnumber($checkup->canceledSum) : '' !!}</code>
                                    </td>
                                    <td>{{ fnumber($checkup->online['web']??0) }}</td>
                                    <td>{{ fnumber($checkup->returnsSum + $checkup->notesSum) }}</td>
                                    <td>
                                        {!! $checkup->retention != 0 ? '<b>Retención:</b> <br><code>' . fnumber($checkup->retention) . '</code><br>' : '' !!}
                                        {!! $checkup->sc_dif != 0 ? '<b>StrenCard:</b> <br><code>' . fnumber($checkup->sc_dif) . '</code>' : '' !!}
                                    </td>
                                    <td>{!! $checkup->statusLabel !!}</td>
                                </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </color-box>
        </div>
    </div>

@endsection
