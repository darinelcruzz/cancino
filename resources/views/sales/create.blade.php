@extends('lte.root')

@push('pageTitle')
    Ventas | Agregar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <color-box title="Agregar venta" color="success" solid>
                {!! Form::open(['method' => 'POST', 'route' => 'sales.store']) !!}

                    <div class="row">
                        @if (auth()->user()->isHelper)
                            <div class="col-md-6">
                                {!! Field::select('store_id', $storesArray, null,
                                    ['empty' => 'Seleccione una tienda', 'tpl' => 'lte/withicon'], ['icon' => 'map-pin'])
                                !!}
                            </div>
                            <div class="col-md-6">
                        @else
                            <div class="col-md-6 col-md-offset-3">
                                <input type="hidden" name="store_id" value="{{ auth()->user()->store_id }}">
                        @endif
                            {!! Field::date('date_sale', date('Y-m-d', strtotime( '-1 days' )), ['tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                        </div>
                    </div>

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
