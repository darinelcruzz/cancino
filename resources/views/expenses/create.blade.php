@extends('lte.root')

@push('pageTitle')
    Gastos | Agregar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-12">
                <color-box title="Agregar gasto" color="success">
                    {!! Form::open(['method' => 'POST', 'route' => 'expenses.store']) !!}
                        <div class="col-md-6">
                            {!! Field::number('check', $last->check + 1, ['disabled', 'tpl' => 'lte/withicon', 'min' => '0'], ['icon' => 'edit']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::date('date', date('Y-m-d'), ['tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('amount', ['tpl' => 'lte/withicon', 'min' => '0', 'step' => '0.01'], ['icon' => 'dollar']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::select('concept',
                                ['CFE' => 'CFE', 'TELMEX' => 'TELMEX', 'Nomina' => 'Nómina', 'SUA' => 'SUA',
                                'IMSS' => 'IMSS', 'CANACO' => 'CANACO', 'Otros gastos', 'Otros gastos', 'Cancelado' => 'Cancelado'], null,
                                ['empty' => 'Seleccione una tienda', 'tpl' => 'lte/withicon'], ['icon' => 'map-pin'])
                            !!}
                        </div>
                        <div class="col-md-12">
                            {!! Field::text('observations', ['tpl' => 'lte/withicon'], ['icon' => 'pencil']) !!}
                        </div>
                        <div class="col-md-12">
                            {{-- {!! Form::submit('Agregar', ['class' => 'btn btn-success btn-block']) !!} --}}
                        </div>
                        <input type="hidden" name="check" value="{{ $last->check + 1 }}">
                        <input type="hidden" name="type" value="0">
                        <input type="hidden" name="store_id" value="{{ $store }}">
                    {!! Form::close() !!}
                </color-box>
            </div>
        </div>
    </div>

@endsection
