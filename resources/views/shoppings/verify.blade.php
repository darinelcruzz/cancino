@extends('lte.root')

@push('pageTitle')
    Compras | Verificar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <color-box title="Compras de {{ $store->name }}" label="{{ count($shoppings) }}" color="success" solid>
                {!! Form::open(['method' => 'POST', 'route' => 'admin.verify']) !!}
                    <div class="box-body">
                        <data-table example='1'>
                            {{ drawHeader('id', 'Fecha', 'Folio', 'Monto') }}
                            <template slot="body">
                                @foreach ($shoppings as $shopping)
                                    <tr>
                                        <td>{!! Form::checkboxes('shoppings', [$shopping->id => $shopping->id]) !!}</td>
                                        <td>{{ fdate($shopping->date, 'j/M/y', 'Y-d-m') }}</td>
                                        <td>{{ $shopping->folio }}</td>
                                        <td>{{ fnumber($shopping->amount) }}</td>
                                    </tr>
                                @endforeach
                            </template>
                        </data-table>
                    </div>
                    <div class="box-footer">
                        {!! Form::submit('Verificar', ['class' => 'btn btn-success btn-block']) !!}
                    </div>

                {!! Form::close() !!}
            </color-box>
        </div>
    </div>
@endsection
