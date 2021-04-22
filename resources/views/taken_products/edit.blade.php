@extends('lte.root')

@push('pageTitle', 'En uso | Destruir')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <color-box title="Destrucción de {{ $store->name }}" color="danger" solid>
                {!! Form::open(['method' => 'POST', 'route' => 'taken_products.update']) !!}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::number('pos', ['label' => 'Número POS']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::date('deleted_at', now(), ['label' => 'Fecha [POS]']) !!}
                            </div>
                        </div>

                        @if($errors->has('items'))
                            <div class="has-error">
                                <p class="help-block">Por favor marca los IDs a destruir</p>
                            </div>
                        @endif

                        <data-table>
                            {{ drawHeader('<i class="fa fa-check"></i>', 'modelo', 'fecha', 'usuario') }}
                            <template slot="body">
                                @foreach ($taken_products as $taken_product)
                                    <tr>
                                        {{-- <td>{!! Form::checkboxes('items', [$taken_product->id => $taken_product->id], ['v-model' => 'taken_products']) !!}</td> --}}
                                        <td>
                                            <input type="checkbox" value="{{ $taken_product->id }}" v-model="wastes">
                                        </td>
                                        <td>{{ $taken_product->code }}</td>
                                        <td>{{ fdate($taken_product->taken_at, 'd/M/Y', 'Y-m-d') }}</td>
                                        <td>{{ $taken_product->user->name }}</td>
                                    </tr>
                                @endforeach
                            </template>
                        </data-table>
                    </div>
                    <div class="box-footer">
                        <input type="hidden" name="status" value="destruido">
                        <div v-if="wastes[0] != null">
                            <input type="hidden" name="items" :value="wastes">
                        </div>
                        {!! Form::submit('Destruir', ['class' => 'btn btn-danger btn-block']) !!}
                    </div>

                {!! Form::close() !!}
            </color-box>
        </div>
    </div>
@endsection
