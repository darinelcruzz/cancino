@extends('lte.root')

@push('pageTitle', 'Cuentas | Tiendas')

@section('content')
    <div class="row">
        @foreach ($stores as $store)
            <div class="col-lg-4 col-md-6">
                <div class="small-box bg-{{ $store->color }}">
                    <div class="inner">
                        <h4><b>{{ $store->name }}</b></h4>
                        <h3 align="center"><b>{{ fnumber($store->expenses_account->balance ?? 0) }}</b></h3>
                        {{-- <h4 align="center">{{ fdate(App\Expense::lastUpdate($store->id)->date, 'd/M/Y', 'Y-m-d') }}</h4> --}}
                    </div>
                    <div class="icon">
                        <i class="fa fa-dollar"></i>
                    </div>
                </div>
                <a href="{{ route('checks.index', $store)}}" class="btn btn-block btn-{{ $store->color }}">Gastos</a>
                <br>
            </div>
        @endforeach
    </div>


    <div class="row">
        <div class="col-md-12 col-lg-6">
            <color-box title="Ingresos" color="success">
                {!! Form::open(['method' => 'POST', 'route' => 'account_movements.store']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::select('bank_account_id', $bank_accounts, null,
                                ['empty' => 'Seleccione una tienda', 'tpl' => 'lte/withicon'], ['icon' => 'map-pin'])
                            !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('amount', ['tpl' => 'lte/withicon', 'min' => '0', 'step' => '0.01'], ['icon' => 'dollar']) !!}
                        </div>
                    </div>
                    @if(auth()->user()->level != 2)
                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::date('added_at', date('Y-m-d'), ['tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::text('concept', ['tpl' => 'lte/withicon'], ['icon' => 'edit']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::select('expenses_group_id', $groupA, null,
                                    ['empty' => 'Seleccione un grupo', 'tpl' => 'lte/withicon', 'v-model.number' => 'concept'], ['icon' => 'map-pin'])
                                !!}
                            </div>
                            <div class="col-md-6">
                                <provider-select :group="concept" icon="truck" label="Proveedor" name="provider_id"></provider-select>
                                <input type="hidden" name="type" value="abono">
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::date('added_at', date('Y-m-d'), ['tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                                <input type="hidden" name="concept" value="Entre cuentas">
                                <input type="hidden" name="expenses_group_id" value="1">
                                <input type="hidden" name="provider_id" value="1">
                                <input type="hidden" name="type" value="abono">
                            </div>
                        </div>
                    @endif
                    {!! Form::submit('Agregar', ['class' => 'btn btn-success pull-right']) !!}

                {!! Form::close() !!}
            </color-box>
        </div>
        
        @if(auth()->user()->level != 2)

            <div class="col-md-12 col-lg-6">
                <color-box title="Gastos sin cheque" color="danger">
                    {!! Form::open(['method' => 'POST', 'route' => 'account_movements.store']) !!}
                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::select('bank_account_id', $bank_accounts, null,
                                    ['empty' => 'Seleccione una tienda', 'tpl' => 'lte/withicon'], ['icon' => 'map-pin'])
                                !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::number('amount', ['tpl' => 'lte/withicon', 'min' => '0', 'step' => '0.01'], ['icon' => 'dollar']) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::date('added_at', date('Y-m-d'), ['tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::text('concept', ['tpl' => 'lte/withicon'], ['icon' => 'edit']) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::select('expenses_group_id', $groupB, null,
                                    ['empty' => 'Seleccione un grupo', 'tpl' => 'lte/withicon', 'v-model.number' => 'concept2'], ['icon' => 'map-pin'])
                                !!}
                            </div>
                            <div class="col-md-6">
                                <provider-select :group="concept2" icon="truck" label="Proveedor" name="provider_id"></provider-select>
                                <input type="hidden" name="type" value="cargo">
                            </div>
                        </div>
                        
                        {!! Form::submit('Agregar', ['class' => 'btn btn-danger pull-right']) !!}

                    {!! Form::close() !!}
                </color-box>
            </div>

        @endif
    </div>
@endsection
