@extends('lte.root')
@push('pageTitle')
    Saldos | Lista
@endpush

@section('content')
    <div class="row">
        @for ($i=2; $i < 6; $i++)
            <div class="col-lg-3 col-md-6">
                <div class="small-box bg-{{ App\Store::find($i)->color }}">
                    <div class="inner">
                        <h4><b>{{ App\Store::find($i)->name }}</b></h4>
                        <h3 align="center"><b>{{ fnumber(App\Expense::balanceByStore($i)) }}</b></h3>
                        <h4 align="center">{{ fdate(App\Expense::lastUpdate($i)->date, 'd/M/Y', 'Y-m-d') }}</h4>
                    </div>
                    <div class="icon">
                        <i class="fa fa-dollar"></i>
                    </div>
                </div>
                    <a href="{{ route('admin.expenses', ['store' => $i])}}" class="btn btn-block btn-{{ App\Store::find($i)->color }}">Gastos</a>
                    <br>
            </div>
        @endfor
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-6">
            <color-box title="Ingresos" color="success">
                {!! Form::open(['method' => 'POST', 'route' => 'expenses.store']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::select('store_id',
                                ['2' => 'Chiapas', '3' => 'Soconusco', '4' => 'Altos', '5' => 'Plaza'], null,
                                ['empty' => 'Seleccione una tienda', 'tpl' => 'lte/withicon', 'label' => 'Tienda'], ['icon' => 'map-pin'])
                            !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('amount', ['tpl' => 'lte/withicon', 'min' => '0', 'step' => '0.01'], ['icon' => 'dollar']) !!}
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                {!! Field::date('date', date('Y-m-d'), ['tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                            </div>
                        </div>
                        <input type="hidden" name="type" value="1">
                    {!! Form::submit('Agregar', ['class' => 'btn btn-success pull-right']) !!}

                {!! Form::close() !!}
            </color-box>
        </div>
        <div class="col-md-12 col-lg-6">
            <color-box title="Gastos sin cheque" color="danger">
                {!! Form::open(['method' => 'POST', 'route' => 'expenses.store']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::select('store_id',
                                ['2' => 'Chiapas', '3' => 'Soconusco', '4' => 'Altos', '5' => 'Plaza'], null,
                                ['empty' => 'Seleccione una tienda', 'tpl' => 'lte/withicon', 'label' => 'Tienda'], ['icon' => 'map-pin'])
                            !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('amount', ['tpl' => 'lte/withicon', 'min' => '0', 'step' => '0.01'], ['icon' => 'dollar']) !!}
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::date('date', date('Y-m-d'), ['tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::text('concept', ['tpl' => 'lte/withicon'], ['icon' => 'map-pin']) !!}
                            </div>
                        </div>
                        <input type="hidden" name="type" value="0">
                    {!! Form::submit('Agregar', ['class' => 'btn btn-success pull-right']) !!}

                {!! Form::close() !!}
            </color-box>
        </div>
    </div>
@endsection
