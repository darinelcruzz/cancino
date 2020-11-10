@extends('lte.root')

@push('pageTitle', 'Tiendas | Agregar')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <color-box solid color="vks" title="Datos de la nueva tienda">
                {!! Form::open(['method' => 'POST', 'route' => 'stores.store']) !!}

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::text('name', ['tpl' => 'lte/withicon', 'ph' => 'ejemplo: Tonalá'], ['icon' => 'comment']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Field::text('rfc', ['tpl' => 'lte/withicon'], ['icon' => 'barcode']) !!}
                    </div>
                </div>
                    
                    {!! Field::text('social', ['tpl' => 'lte/withicon', 'ph' => 'ejemplo: Electrónica S.A. de C.V.'], ['icon' => 'pen-alt']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::select('color', ['primary' => 'Azul', 'danger' => 'Rojo', 'black' => 'Negro'], null, 
                                ['tpl' => 'lte/withicon', 'empty' => 'Seleccione un color'],
                                ['icon' => 'brush'])
                            !!}                            
                        </div>
                        <div class="col-md-6">
                            {!! Field::select('type', ['c' => 'Corportativo', 'p' => 'P de algo', 's' => 'Shop'], null,
                                ['tpl' => 'lte/withicon', 'empty' => 'Seleccione un tipo'],
                                ['icon' => 'sort']) 
                            !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::select('manager', $managers, null, 
                                ['tpl' => 'lte/withicon', 'empty' => 'Seleccione al gerente'],
                                ['icon' => 'user-tie'])
                            !!}                            
                        </div>
                        <div class="col-md-6">
                            {!! Field::text('account', ['tpl' => 'lte/withicon', 'ph' => 'ejemplo: 0123456789'], ['icon' => 'bank']) !!}
                        </div>
                    </div> 

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('star', 1, ['tpl' => 'lte/withicon'], ['icon' => 'star']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('golden', 1, ['tpl' => 'lte/withicon'], ['icon' => 'medal']) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('cash', 0, ['label' => 'Dinero para monedas', 'tpl' => 'lte/withicon'], ['icon' => 'cash-register']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('expense', 0, ['label' => 'Dinero para gastos', 'tpl' => 'lte/withicon'], ['icon' => 'wallet']) !!}
                        </div>
                    </div> 

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('salary', 0, ['tpl' => 'lte/withicon'], ['icon' => 'money-check-alt']) !!}
                        </div>
                    </div>   

                    <hr>
                    {!! Form::submit('AGREGAR', ['class' => 'btn btn-github pull-right']) !!}
                {!! Form::close() !!}
            </color-box>
        </div>
    </div>

@endsection
