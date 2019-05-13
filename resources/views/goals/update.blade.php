@extends('lte.root')

@push('pageTitle')
    Metas | Editar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <color-box title="Editar metas" color="success" solid>
                {!! Form::open(['method' => 'POST', 'route' => 'goals.update']) !!}
                    @foreach ($stores as $store)
                        <div class="row">
                            <div class="col-md-4 col-md-offset-5">
                                <h4>{{ $store->name }}</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::select('point' . $store->id,
                                    ['rojo' => 'Punto Rojo', 'negro' => 'Punto Negro', 'estrella' => 'Estrella', 'dorada' => 'Estrella Dorada'],
                                    null, ['empty' => 'Seleccione el punto', 'tpl' => 'lte/withicon', 'label' => 'Punto'], ['icon' => 'spinner'])
                                    !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Field::number('sale' . $store->id, ['step' => '0.01', 'tpl' => 'lte/withicon', 'label' => 'Venta'],
                                        ['icon' => 'dollar']) !!}
                                </div>
                            </div>
                    @endforeach
                    <hr>
                    <input type="hidden" name="month" value="{{ $month }}">
                    <input type="hidden" name="year" value="{{ $year }}">
                    {!! Form::submit('Editar', ['class' => 'btn btn-success pull-right']) !!}

                {!! Form::close() !!}
            </solid-box>
        </div>
    </div>

@endsection
