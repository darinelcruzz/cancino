@extends('lte.root')

@push('pageTitle')
    Arqueo | Netpay
@endpush

@section('content')
    <div class="row">
        {!! Form::open(['method' => 'post', 'route' => 'checkup.netpay']) !!}
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
            
    </div>

    <div class="row">
        <div class="col-md-12">
            <color-box color="{{ $store->color }}" title="Transferencias {{ $store->name }}">

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Corte</th>
                            <th>Netpay I</th>
                            <th>Netpay II</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($checkups as $checkup)
                            <tr>
                                <td>{{ $checkup->date_sale }}</td>
                                @php
                                    $sum = 0;
                                @endphp
                            @foreach($checkup->net_pay_1 as $amount)
                                @php
                                    $sum += $amount['a'];
                                @endphp
                            @endforeach
                                <td>{{ fnumber($sum) }}</td>
                                @php
                                    $sum = 0;
                                @endphp
                            @foreach($checkup->net_pay_2 as $amount)
                                @php
                                    $sum += $amount['a'];
                                @endphp
                            @endforeach
                                <td>{{ fnumber($sum) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </color-box>
        </div>
    </div>

@endsection
