@extends('lte.root')

@push('pageTitle')
    Prestamos | Agregar
@endpush

@push('headerTitle')
    <a href="{{ route('loans.index') }}" class="btn btn-success btn"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;atras</a>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-6">
            <color-box title="Agregar prestamo" color="success" solid>
                {!! Form::open(['method' => 'POST', 'route' => 'loans.store']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::select('from',
                                ['2' => 'Chiapas', '3' => 'Soconusco', '4' => 'Altos', '5' => 'Plaza'], null,
                                ['empty' => 'Seleccione una tienda', 'tpl' => 'lte/withicon'], ['icon' => 'map-pin'])
                            !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::text('item', ['tpl' => 'lte/withicon'], ['icon' => 'tag']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('quantity', ['tpl' => 'lte/withicon', 'min' => '0'], ['icon' => 'list']) !!}
                        </div>
                    </div>
                    <hr>
                    <input type="hidden" name="to" value="{{ auth()->user()->store_id }}">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    {!! Form::submit('Agregar', ['class' => 'btn btn-success pull-right']) !!}

                {!! Form::close() !!}
            </color-box>
        </div>
        <div class="col-md-6">
            <color-box title="Agregados recientemente" color="success">
                <data-table example="1">
                    {{ drawHeader('ID','Tienda', 'Modelo', 'Cantidad') }}

                    <template slot="body">
                        @foreach($recients as $loan)
                            <tr>
                                <td>{{ $loan->id }}</td>
                                <td>{{ $loan->fromr->name }}</td>
                                <td>{{ $loan->item }}</td>
                                <td>{{ $loan->quantity }}</td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
    </div>

@endsection
