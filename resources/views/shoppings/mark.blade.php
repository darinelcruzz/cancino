@extends('lte.root')

@push('pageTitle', 'Compras | Impresas')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <color-box title="Compras de {{ $store->name }}" label="{{ count($shoppings) }}" color="primary" solid>
                {!! Form::open(['method' => 'POST', 'route' => ['shoppings.verify', $store]]) !!}
                    <div class="box-body">
                        <data-table example='1'>
                            {{ drawHeader('ID', 'Folio', 'Monto', 'POS', 'Pago') }}
                            <template slot="body">
                                @foreach ($shoppings as $shopping)
                                    <tr>
                                        <td>{!! Form::checkboxes('shoppings', [$shopping->id => $shopping->id]) !!}</td>
                                        <td>{{ $shopping->folio }}</td>
                                        <td>
                                          {{ fnumber($shopping->amount) }}
                                          @if ($shopping->prefix == "AFSM-")
                                            <br>
                                            <code>{{ number_format($shopping->amount * 0.02, 2) }} </code>
                                          @endif
                                        </td>
                                        <td>
                                          @if ($shopping->type == 'varfra')
                                            VAR/FRA {{ $shopping->document > 0 ? $shopping->document : ''}}
                                          @else
                                            {{ $shopping->document }} <br> {{ $shopping->pos }}
                                          @endif
                                        </td>
                                        <td>{{ fdate($shopping->date, 'd M y', 'Y-m-d') }}</td>
                                    </tr>
                                @endforeach
                            </template>
                        </data-table>
                    </div>
                    <div class="box-footer">
                        <input type="hidden" name="status" value="impreso">
                        {!! Form::submit('Marcar como impreso', ['class' => 'btn btn-primary btn-block']) !!}
                    </div>

                {!! Form::close() !!}
            </color-box>
        </div>
    </div>
@endsection
