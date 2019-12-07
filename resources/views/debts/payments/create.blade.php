@extends('lte.root')

@push('pageTitle')
    Abonos | Agregar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <color-box title="Agregar deuda" color="success" solid>
                {!! Form::open(['method' => 'POST', 'route' => 'payments.store']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::date('paid_at', date('Y-m-d'), ['tpl' => 'lte/withicon', 'label' => 'fecha'], ['icon' => 'calendar']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::select('method', ['1' => 'Nómina', '2' => 'Depósito', '3' => 'Efectivo'], null,
                                ['empty' => 'Seleccione a quien le debe', 'tpl' => 'lte/withicon'], ['icon' => 'store'])
                            !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            {!! Field::number('amount', $debt->payments, ['tpl' => 'lte/withicon', 'min' => '0', 'step' => '1', 'max' => $debt->difference], ['icon' => 'dollar']) !!}
                        </div>
                    </div>

                    <input type="hidden" name="debt_id" value="{{ $debt->id }}">
                    <button type="submit" class="btn btn-success pull-right" onclick="submitForm(this);">Agregar</button>

                {!! Form::close() !!}
            </solid-box>
        </div>
    </div>

@endsection
