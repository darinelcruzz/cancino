@extends('lte.root')

@push('pageTitle')
    Ventas | Editar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <color-box title="Editar venta {{ $sale->id }} de {{ $sale->store->name }}" color="vks" solid>
                {!! Form::open(['method' => 'POST', 'route' => 'sales.update']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::date('date_sale', $sale->date_sale, ['tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::date('date_deposit', $sale->date_deposit, ['tpl' => 'lte/withicon'], ['icon' => 'calendar-check']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('retention', $sale->retention, ['tpl' => 'lte/withicon', 'step' => '0.01'], ['icon' => 'dollar']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::date('ret_date', $sale->ret_date, ['tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('compensation', $sale->compensation, ['tpl' => 'lte/withicon', 'step' => '0.01'], ['icon' => 'usd']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('sc_dif', $sale->checkup->sc_dif, ['tpl' => 'lte/withicon', 'step' => '0.01'], ['icon' => 'credit-card']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('net_pay', $sale->net_pay, ['tpl' => 'lte/withicon', 'step' => '0.01'], ['icon' => 'money']) !!}
                        </div>
                    </div>
                    {!! Field::text('observations', $sale->observations, ['tpl' => 'lte/withicon'], ['icon' => 'eye']) !!}
                    <hr>
                    <input type="hidden" name="id" value="{{ $sale->id }}">
                    {!! Form::submit('E D I T A R', ['class' => 'btn btn-github pull-right']) !!}

                {!! Form::close() !!}
            </solid-box>
        </div>
    </div>

@endsection
