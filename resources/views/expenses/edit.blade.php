@extends('lte.root')

@push('pageTitle')
    Gastos | Agregar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-12">
                <color-box title="Agregar gasto" color="success">
                    {!! Form::open(['method' => 'POST', 'route' => 'expenses.store', 'enctype' => 'multipart/form-data']) !!}
                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::number('check', $expense->check, ['disabled', 'tpl' => 'lte/withicon', 'min' => '0'], ['icon' => 'money-check-alt']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::date('date', $expense->date, ['tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::text('name', $expense->name, ['tpl' => 'lte/withicon', 'placeholder' => 'De a quien sale el cheque'], ['icon' => 'user']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::number('amount', $expense->amount, ['tpl' => 'lte/withicon', 'min' => '0', 'step' => '0.01'], ['icon' => 'dollar']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {!! Field::text('letter', $expense->letter, ['tpl' => 'lte/withicon', 'placeholder' => 'Monto con letra (sin /100 MXN)'], ['icon' => 'signature']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::text('concept', $expense->concept, ['tpl' => 'lte/withicon'], ['icon' => 'pen']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::select('group',
                                    ['CFE' => 'CFE', 'TELMEX' => 'TELMEX', 'Nomina' => 'Nómina', 'SUA' => 'SUA',
                                    'IMSS' => 'IMSS', 'CANACO' => 'CANACO', 'Otros gastos' => 'Otros gastos', 'Cancelado' => 'Cancelado'],  $expense->group,
                                    ['empty' => 'Seleccione el consepto', 'tpl' => 'lte/withicon', 'v-model' => 'concept'], ['icon' => 'map-pin'])
                                    !!}
                            </div>
                        </div>
                        {!! Field::text('observations', ['tpl' => 'lte/withicon'], ['icon' => 'edit']) !!}
                        <file-input v-if='concept=="Otros gastos"'></file-input>
                        <hr>
                        {!! Form::submit('Agregar', ['class' => 'btn btn-success btn-block']) !!}
                        <input type="hidden" name="id" value="{{  $expense->id }}">
                    {!! Form::close() !!}
                </color-box>
            </div>
        </div>
    </div>

@endsection
