@extends('lte.root')

@push('pageTitle')
    NC | Agregar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <color-box title="Agregar nota de crédito" color="success" solid>
                {!! Form::open(['method' => 'POST', 'route' => 'notes.add']) !!}

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
                        <div class="col-md-6">
                            {!! Form::submit('Completa', ['class' => 'btn btn-success btn-block', 'name' => 'complete']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::submit('Faltante', ['class' => 'btn btn-warning btn-block', 'name' => 'pending']) !!}
                        </div>
                    </div>

                {!! Form::close() !!}
            </solid-box>
        </div>
    </div>

@endsection
