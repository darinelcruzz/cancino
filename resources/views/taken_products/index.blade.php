@extends('lte.root')

@push('pageTitle', 'Productos en uso')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <color-box title="Agregar productos" color="vks" solid>
                {!! Form::open(['method' => 'POST', 'route' => 'taken_products.store']) !!}

                    {!! Field::text('code', ['tpl' => 'lte/withicon'], ['icon' => 'barcode']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('quantity', 1,['tpl' => 'lte/withicon'], ['icon' => 'th']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::date('taken_at', now(), ['label' => 'Fecha', 'tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                        </div>
                    </div>

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
            <color-box title="Pendientes" color="danger" button solid>
                <table class="table table-striped table-bordered simple">
                    <thead>
                        <tr>
                            <th><small>FECHA</small></th>
                            <th><small>MODELO</small></th>
                            <th><small>CANTIDAD</small></th>
                            <th><small>MOTIVO</small></th>
                            <th><small>USUARIO</small></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($pending->sortByDesc('taken_at') as $taken_product)
                            <tr>
                                <td>{{ strtoupper(fdate($taken_product->taken_at, 'd/M/y', 'Y-m-d')) }}</td>
                                <td>{{ $taken_product->code }}</td>
                                <td>{{ $taken_product->quantity }}</td>
                                <td>{{ $taken_product->observations }}</td>
                                <td>{{ $taken_product->user->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </color-box>

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
@endsection
