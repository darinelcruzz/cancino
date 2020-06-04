@extends('lte.root')

@push('pageTitle')
    Arqueo | Transferencias y cheques
@endpush

@section('content')
    <div class="row">
        {!! Form::open(['method' => 'post', 'route' => 'checkup.transfers']) !!}
            <div class="col-md-3">
                {!! Field::date('from', $from, ['tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
            </div>
            <div class="col-md-3">
                {!! Field::date('to', $to, ['tpl' => 'lte/withicon'], ['icon' => 'calendar-check']) !!}
            </div>
            @if(isAdmin())
            <div class="col-md-3">
                {!! Field::select('store', $stores, $store->id, ['empty' => 'Selecciona tienda', 'tpl' => 'lte/withicon'], ['icon' => 'store-alt']) !!}
            </div>
            @endif
            <div class="col-md-2">
                <label>&nbsp;</label><br>
                {!! Form::submit('Buscar', ['class' => 'btn btn-github']) !!}
            </div>
        {!! Form::close() !!}


            <div class="col-md-1">
                {!! Form::open(['method' => 'post', 'route' => 'checkup.print', 'target' => '_blank']) !!}
                    <input type="hidden" name="from" value="{{ $from }}">
                    <input type="hidden" name="to" value="{{ $to }}">
                    <input type="hidden" name="store" value="{{ $store->id }}">
                    <label>&nbsp;</label><br>
                    {!! Form::submit('Imprimir', ['class' => 'btn btn-success']) !!}
                {!! Form::close() !!}
            </div>

            
    </div>

    <div class="row">
        <div class="col-md-12">
            <color-box color="{{ $store->color }}" title="Transferencias {{ $store->name }}">

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Corte</th>
                            <th>Tipo</th>
                            <th>Cliente</th>
                            <th style="text-align: right;">Monto</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($checkups as $checkup)
                            @foreach($checkup->transfer as $transfer)
                            <tr>
                                <td>{{ $checkup->date_sale }}</td>
                                <td>{{ ucfirst($transfer['t']) }}</td>
                                <td>{{ $transfer['c'] }}</td>
                                <td style="text-align: right;">{{ number_format($transfer['a'], 2) }}</td>
                            </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>

            </color-box>
        </div>
    </div>

@endsection
