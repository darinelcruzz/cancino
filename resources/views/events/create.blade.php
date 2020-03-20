@extends('lte.root')
@push('pageTitle')
    Eventos | Agregar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-5">
            <color-box title="Agregar evento" color="success">
                {!! Form::open(['method' => 'POST', 'route' => 'events.store']) !!}
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::text('name', ['tpl' => 'lte/withicon'], ['icon' => 'calendar-week']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::number('budget',['tpl' => 'lte/withicon'], ['icon' => 'hand-holding-usd']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::date('start_at', ['tpl' => 'lte/withicon'], ['icon' => 'calendar-alt']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                    <hr>
                    {!! Form::submit('Agregar', ['class' => 'btn btn-success btn-block']) !!}
                {!! Form::close() !!}
            </color-box>
        </div>
    </div>
@endsection
