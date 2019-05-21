@extends('lte.root')

@push('pageTitle')
    NC | Agregar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <color-box title="Agregar nota de crédito {{ $note->folio }}" color="success" solid>
                {!! Form::open(['method' => 'POST', 'route' => 'notes.update']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::select('store_id',
                                ['2' => 'Chiapas', '3' => 'Soconusco', '4' => 'Altos', '5' => 'Plaza'], $note->store_id,
                                ['empty' => 'Seleccione una tienda', 'tpl' => 'lte/withicon'], ['icon' => 'map-pin'])
                            !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('folio', $note->folio, ['tpl' => 'lte/withicon'], ['icon' => 'barcode']) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('amount', $note->amount, ['tpl' => 'lte/withicon', 'step' => '0.01'], ['icon' => 'money']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::date('date_nc', $note->date_nc, ['tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            {!! Field::text('items', $note->items, ['tpl' => 'lte/withicon'], ['icon' => 'tags']) !!}
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('document', $note->document, ['tpl' => 'lte/withicon'], ['icon' => 'tags']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::date('date_pos', $note->date_pos, ['tpl' => 'lte/withicon'], ['icon' => 'edit']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {!! Field::text('observations', $note->observations, ['tpl' => 'lte/withicon'], ['icon' => 'edit']) !!}
                        </div>
                    </div>
                    <hr>
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="id" value="{{ $note->id }}">
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::submit('Modificar', ['class' => 'btn btn-success btn-block']) !!}
                        </div>
                    </div>

                {!! Form::close() !!}
            </solid-box>
        </div>
    </div>

@endsection
