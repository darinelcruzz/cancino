@extends('lte.root')

@push('pageTitle', 'Pagos | Agregar')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <color-box title="Agregar pago" color="vks" solid>
                {!! Form::open(['method' => 'POST', 'route' => ['service_payments.store', $service]]) !!}

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('amount', $service->amount, ['tpl' => 'lte/withicon', 'step' => '0.01'], ['icon' => 'money']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::select('method', ['efectivo' => 'Efectivo', 'tarjeta' => 'Tarjeta', 'transferencia' => 'Transferencia'], null,
                                ['empty' => 'Seleccione método de pago', 'tpl' => 'lte/withicon'], ['icon' => 'credit-card'])
                            !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::date('paid_at', date('Y-m-d'), ['label' => 'Fecha pago', 'tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                        </div>
                    </div>

                    <hr>

                    {!! Form::submit('Agregar', ['class' => 'btn btn-github pull-right']) !!}

                {!! Form::close() !!}
            </solid-box>
        </div>
    </div>

@endsection
