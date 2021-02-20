@extends('lte.root')

@push('pageTitle')
    Compras | Verificar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <color-box title="Compras de {{ $store->name }}" label="{{ count($shoppings) }}" color="success" solid>
                {!! Form::open(['method' => 'POST', 'route' => ['shoppings.verify', $store]]) !!}
                    <div class="box-body">
                        <data-table example='1'>
                            {{ drawHeader('id', 'Folio', 'Monto', 'Fecha', 'POS') }}
                            <template slot="body">
                                @foreach ($shoppings as $shopping)
                                    <tr>
                                        <td>{!! Form::checkboxes('shoppings', [$shopping->id => $shopping->id]) !!}</td>
                                        <td>{{ $shopping->folio }}</td>
                                        <td>{{ fnumber($shopping->amount) }}</td>
                                        <td>{{ $shopping->document }} <br> {{ $shopping->pos }} </td>
                                        <td>{{ fdate($shopping->invoiced_at, 'd M y', 'Y-m-d') }}</td>
                                    </tr>
                                @endforeach
                            </template>
                        </data-table>
                    </div>
                    <div class="box-footer">
                        <input type="hidden" name="status" value="verificado">
                        {!! Form::submit('Verificar', ['class' => 'btn btn-success btn-block']) !!}
                    </div>

                {!! Form::close() !!}
            </color-box>
        </div>
    </div>
@endsection
