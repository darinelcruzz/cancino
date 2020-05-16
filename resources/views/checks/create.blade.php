@extends('lte.root')

@push('pageTitle', 'Cheque | Agregar')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-12">
                <color-box title="Agregar cheque" color="success">
                    {!! Form::open(['method' => 'POST', 'route' => ['checks.store', getStore()], 'enctype' => 'multipart/form-data']) !!}
                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::number('folio', $last ? $last->folio + 1: 1, ['disabled', 'tpl' => 'lte/withicon', 'min' => '0'], ['icon' => 'money-check-alt']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::date('emitted_at', date('Y-m-d'), ['tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::text('name', ['tpl' => 'lte/withicon', 'placeholder' => 'A quien sale el cheque'], ['icon' => 'user']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::number('amount', 0, ['tpl' => 'lte/withicon', 'min' => '0', 'step' => '0.01'], ['icon' => 'dollar']) !!}
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-md-12">
                                {!! Field::text('letter', ['tpl' => 'lte/withicon', 'placeholder' => 'Monto con letra (sin /100 MXN)'], ['icon' => 'signature']) !!}
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::text('concept', ['tpl' => 'lte/withicon'], ['icon' => 'pen']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::select('expenses_group_id', $groups, null, ['empty' => 'Seleccione el grupo', 'tpl' => 'lte/withicon', 'v-model' => 'concept'], ['icon' => 'map-pin'])
                                    !!}
                            </div>
                        </div>
                        {!! Field::text('observations', ['tpl' => 'lte/withicon'], ['icon' => 'edit']) !!}
                        <file-input v-if='concept==11'></file-input>
                        <hr>
                        {!! Form::submit('Agregar', ['class' => 'btn btn-success btn-block']) !!}
                        
                        <input type="hidden" name="folio" value="{{ $last ? $last->folio + 1: 1 }}">

                        <input type="hidden" name="store_id" value="{{ $store->id }}">
                        <input type="hidden" name="bank_account_id" value="{{ $store->expenses_account->id }}">
                    {!! Form::close() !!}
                </color-box>
            </div>
        </div>
    </div>

@endsection
