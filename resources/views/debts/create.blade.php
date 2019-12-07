@extends('lte.root')

@push('pageTitle')
    Deudas | Agregar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <color-box title="Agregar deuda" color="success" solid>
                {!! Form::open(['method' => 'POST', 'route' => 'debts.store']) !!}

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::select('store_id', $allStoresArray, null,
                            ['empty' => 'Seleccione a quien le debe', 'tpl' => 'lte/withicon'], ['icon' => 'store'])
                        !!}
                    </div>
                    <div class="col-md-6">
                        {!! Field::select('employer_id', $employers, null,
                            ['empty' => 'Seleccione a quien debe', 'tpl' => 'lte/withicon'], ['icon' => 'user'])
                        !!}
                    </div>
                </div>

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::text('description', ['tpl' => 'lte/withicon'], ['icon' => 'edit']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::date('requested_at', date('Y-m-d'), ['tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('amount', ['tpl' => 'lte/withicon', 'min' => '0', 'step' => '1'], ['icon' => 'dollar']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('payments', ['tpl' => 'lte/withicon', 'min' => '0', 'step' => '1'], ['icon' => 'dollar']) !!}
                        </div>
                    </div>


                    <input type="hidden" name="status" value="pendiente">
                    <button type="submit" class="btn btn-success pull-right" onclick="submitForm(this);">Agregar</button>

                {!! Form::close() !!}
            </solid-box>
        </div>
    </div>

@endsection
