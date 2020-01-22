@extends('lte.root')

@push('pageTitle')
    Ventas | Agregar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <color-box title="Agregar venta {{ $sale->store->name }}" color="success" solid>
                {!! Form::open(['method' => 'POST', 'route' => 'sales.update']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::date('date_sale', $sale->date_sale, ['tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::date('date_deposit', $sale->date_deposit, ['tpl' => 'lte/withicon'], ['icon' => 'calendar-check']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {!! Field::text('observations', $sale->observations, ['tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                        </div>
                    </div>
                    <hr>
                    <input type="hidden" name="id" value="{{ $sale->id }}">
                    {!! Form::submit('Editar', ['class' => 'btn btn-success pull-right']) !!}

                {!! Form::close() !!}
            </solid-box>
        </div>
    </div>

@endsection
