@extends('lte.root')

@push('pageTitle')
    NC | Agregar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <color-box title="Agregar nota de crédito" color="success" solid>
                {!! Form::open(['method' => 'POST', 'route' => 'notes.store']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::select('store_id',
                                ['2' => 'Chiapas', '3' => 'Soconusco', '4' => 'Altos', '5' => 'Plaza'], null,
                                ['empty' => 'Seleccione una tienda', 'tpl' => 'lte/withicon'], ['icon' => 'map-pin'])
                            !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('folio', ['tpl' => 'lte/withicon'], ['icon' => 'barcode']) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('amount', ['tpl' => 'lte/withicon', 'step' => '0.01'], ['icon' => 'money']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::date('date_nc', date('Y-m-d'), ['tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            {!! Field::text('items', ['tpl' => 'lte/withicon'], ['icon' => 'tags']) !!}
                        </div>

                    </div>
                    <hr>
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <button type="submit" class="btn btn-success pull-right" onclick="submitForm(this);">Agregar</button>

                {!! Form::close() !!}
            </solid-box>
        </div>
    </div>

@endsection
