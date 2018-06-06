@extends('lte.root')
@push('pageTitle')
    Saldos | Lista
@endpush

@section('content')
    @for ($i=2; $i < 6; $i++)
        <div class="col-lg-3 col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="small-box bg-{{ App\Store::find($i)->color }}">
                        <div class="inner">
                            <h4><b>{{ App\Store::find($i)->name }}</b></h4>
                            <h3 align="center"><b>{{ fnumber(App\Store::find($i)->balance) }}</b></h3>
                            <h4 align="center">{{ fdate(App\Store::find($i)->updated_at, 'd/M/Y') }}</h4>
                        </div>
                        <div class="icon">
                            <i class="fa fa-dollar"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endfor
    <div class="col-md-12">
        <color-box title="Editar" color="info">
            {!! Form::open(['method' => 'POST', 'route' => 'stores.update']) !!}
            <div class="row">
                <div class="col-md-6">
                    {!! Field::select('id',
                        ['2' => 'Chiapas', '3' => 'Soconusco', '4' => 'Altos', '5' => 'Plaza'], null,
                        ['empty' => 'Seleccione una tienda', 'tpl' => 'lte/withicon', 'label' => 'Tienda'], ['icon' => 'map-pin'])
                    !!}
                </div>
                <div class="col-md-6">
                    {!! Field::number('balance', ['tpl' => 'lte/withicon'], ['icon' => 'dollar']) !!}
                </div>
            </div>

            {!! Form::submit('Modificar', ['class' => 'btn btn-success pull-right']) !!}

            {!! Form::close() !!}
        </color-box>
    </div>
@endsection
