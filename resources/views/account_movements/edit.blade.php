@extends('lte.root')

@push('pageTitle', 'Movimiento | Editar')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <color-box title="Editar movimiento {{ $accountMovement->id }}" color="primary">
                {!! Form::open(['method' => 'POST', 'route' => ['account_movements.update', $accountMovement]]) !!}
                    <div class="row">
                        <div class="col-md-12">

                            <div class="row">
                                <div class="col-md-6">
                                    {!! Field::number('amount', $accountMovement->amount, ['tpl' => 'lte/withicon', 'step' => '0.01', 'disabled' => 'true'], ['icon' => 'money']) !!}
                                </div>
                                <div class="col-md-6">
                                    {!!
                                        Field::select('type', ['cargo' => 'Cargo', 'abono' => 'Abono'], $accountMovement->type, ['empty' => 'Seleccione tipo de equipo', 'tpl' => 'lte/withicon', 'disabled' => 'true'], ['icon' => 'screwdriver'])
                                    !!}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    {!! Field::date('added_at', $accountMovement->added_at, ['tpl' => 'lte/withicon', 'disabled' => 'true'], ['icon' => 'calendar-alt']) !!}
                                </div>
                                
                                <div class="col-md-6">
                                    {!! Field::select('bank_account_id', $bank_accounts, $accountMovement->bank_account_id, ['empty' => 'Seleccione la tienda', 'tpl' => 'lte/withicon', 'disabled' => 'true'], ['icon' => 'university']) !!}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    {!! Field::text('concept', $accountMovement->concept, ['tpl' => 'lte/withicon'], ['icon' => 'comments']) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Field::select('expenses_group_id', $groups, null, ['empty' => 'Seleccione el grupo', 'tpl' => 'lte/withicon', 'v-model.number' => 'concept'], ['icon' => 'group'])
                                        !!}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    {!! Field::text('observations', $accountMovement->observations, ['tpl' => 'lte/withicon'], ['icon' => 'edit']) !!}
                                </div>
                                <div class="col-md-6">
                                    <provider-select :group="concept" icon="truck" label="Proveedor" name="provider_id"></provider-select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{ route('bank_accounts.show', $accountMovement->bank_account) }}" class="btn btn-danger btn-block">
                                <small>REGRESAR</small>
                            </a>
                        </div>
                        <div class="col-md-4">
                            {!! Form::submit('GUARDAR + SIG', ['class' => 'btn btn-success btn-block']) !!}
                        </div>
                        <div class="col-md-4">
                            @if($accountMovement->next_register_exists)
                                <a href="{{ $accountMovement->next_route }}" class="btn btn-primary btn-block">
                                    <small>SIGUIENTE</small>
                                </a>
                            @endif
                        </div>
                    </div>

                {!! Form::close() !!}
            </color-box>

        </div>
    </div>

@endsection
