@extends('lte.root')

@push('pageTitle')
    Ventas | Agregar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <color-box title="Agregar venta" color="success" solid>
                {!! Form::open(['method' => 'POST', 'route' => 'sales.revise']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('cash', ['tpl' => 'lte/withicon', 'step' => '0.01'], ['icon' => 'money']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('public', ['tpl' => 'lte/withicon', 'step' => '0.01', 'placeholder' => 'Sin iva (Shop es precio Shop)'], ['icon' => 'users']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            {!! Field::number('total', ['tpl' => 'lte/withicon', 'step' => '0.01', 'placeholder' => 'Total sin IVA'], ['icon' => 'dollar']) !!}
                        </div>
                    </div>
                    <hr>
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="status" value="pendiente">
                    {!! Form::submit('Agregar', ['class' => 'btn btn-success pull-right']) !!}

                {!! Form::close() !!}
            </solid-box>
        </div>
    </div>

@endsection
