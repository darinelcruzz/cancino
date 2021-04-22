@extends('lte.root')

@push('pageTitle', 'Productos en uso')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <color-box title="Agregar productos" color="vks" solid>
                {!! Form::open(['method' => 'POST', 'route' => 'taken_products.store']) !!}

                    {!! Field::text('code', ['tpl' => 'lte/withicon'], ['icon' => 'barcode']) !!}
                    {!! Field::date('taken_at', now(), ['label' => 'Fecha', 'tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                    {!! Field::text('observations', ['label' => 'Motivo', 'tpl' => 'lte/withicon'], ['icon' => 'comments']) !!}

                    <hr>
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="store_id" value="{{ auth()->user()->store_id }}">
                    <button type="submit" class="btn btn-github  btn-block" onclick="submitForm(this);">Agregar</button>

                {!! Form::close() !!}
            </color-box>

            <a href="{{ route('taken_products.print', getStore()->id) }}" class="btn btn-default btn-sm btn-block" target="_blank">
                <i class="fa fa-print"></i>&nbsp;&nbsp;IMPRIMIR PENDIENTES
            </a>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <color-box title="Pendientes" color="danger" button solid>
                        <data-table example="2">
                            {{ drawHeader('fecha', 'modelo', 'motivo', 'usuario') }}
                            <template slot="body">
                                @foreach($pending as $taken_product)
                                    <tr>
                                        <td>{{ fdate($taken_product->taken_at, 'd-M-y', 'Y-m-d') }}</td>
                                        <td>{{ $taken_product->code }}</td>
                                        <td>{{ $taken_product->observations }}</td>
                                        <td>{{ $taken_product->user->name }}</td>
                                    </tr>
                                @endforeach
                            </template>
                        </data-table>
                    </color-box>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <color-box title="Dados de baja" color="success" button collapsed solid>
                        <data-table example="1">
                            {{ drawHeader('POS', 'productos', 'fecha') }}
                            <template slot="body">
                                @foreach($deleted as $pos => $taken_products)
                                    <tr>
                                        <td>{{ $pos }}</td>
                                        <td>
                                            @foreach($taken_products as $taken_product)
                                                {{ $taken_product->code }} {{ $loop->last ? '': ', ' }}
                                            @endforeach
                                        </td>
                                        <td>{{ fdate($taken_products->first()->deleted_at, 'd/M/y', 'Y-m-d') }}</td>
                                    </tr>
                                @endforeach
                            </template>
                        </data-table>
                    </color-box>
                </div>
            </div>
        </div>
    </div>
@endsection
