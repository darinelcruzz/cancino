@extends('lte.root')

@push('pageTitle', 'Movimiento | Editar')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <color-box title="Agregar un movimiento" color="primary">
                {!! Form::open(['method' => 'POST', 'route' => ['account_movements.update', $accountMovement]]) !!}
                    <div class="row">
                        <div class="col-md-12">

                            <div class="row">
                                <div class="col-md-6">
                                    {!! Field::number('amount', $accountMovement->amount, ['tpl' => 'lte/withicon', 'step' => '0.01'], ['icon' => 'money']) !!}
                                </div>
                                <div class="col-md-6">
                                    {!!
                                        Field::select('type', ['cargo' => 'Cargo', 'abono' => 'Abono'], $accountMovement->type, ['empty' => 'Seleccione tipo de equipo', 'tpl' => 'lte/withicon'], ['icon' => 'screwdriver'])
                                    !!}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    {!! Field::text('concept', $accountMovement->concept, ['tpl' => 'lte/withicon'], ['icon' => 'comments']) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Field::select('bank_account_id', $bank_accounts, $accountMovement->bank_account_id, ['empty' => 'Seleccione la tienda', 'tpl' => 'lte/withicon'], ['icon' => 'university']) !!}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    {!! Field::date('added_at', $accountMovement->added_at, ['tpl' => 'lte/withicon'], ['icon' => 'calendar-alt']) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Field::select('provider_id', $providers, $accountMovement->provider_id, ['empty' => 'Seleccione el proveedor', 'tpl' => 'lte/withicon'], ['icon' => 'truck']) !!}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    {!! Field::select('expenses_group_id', $groups, $accountMovement->expenses_group_id, ['empty' => 'Seleccione el grupo', 'tpl' => 'lte/withicon'], ['icon' => 'cubes']) !!}
                                </div>
                            </div>

                        </div>
                    </div>
                    <hr>
                    {!! Form::submit('Guardar cambios', ['class' => 'btn btn-primary btn-block']) !!}

                {!! Form::close() !!}
            </color-box>

        </div>
    </div>

@endsection