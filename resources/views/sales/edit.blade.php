@extends('lte.root')

@push('pageTitle')
    Ventas | Agregar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <color-box title="Agregar venta {{ $sale->store->name }}" color="success" solid>
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
                            {!! Field::number('retention', $sale->retention, ['tpl' => 'lte/withicon', 'min' => '0'], ['icon' => 'dollar']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::date('ret_date', $sale->ret_date, ['tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('sc_dif', $sale->checkup->sc_dif, ['tpl' => 'lte/withicon', 'min' => '0'], ['icon' => 'credit-card']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::text('observations', $sale->observations, ['tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                        </div>
                    </div>
                    <hr>
                    <input type="hidden" name="id" value="{{ $sale->id }}">
                    {!! Form::submit('Editar', ['class' => 'btn btn-success pull-right']) !!}

                {!! Form::close() !!}
            </solid-box>
        </div>
    </div>

@endsection
