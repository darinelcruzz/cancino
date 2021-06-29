@extends('lte.root')

@push('pageTitle', 'Conteos')

@section('content')

    @if(session('status') && $mode == 'normal')
        <div class="alert alert-{{ session('status') == 'ARTÍCULO NO ENCONTRADO' ? 'danger': 'success'}}">
            {!! session('status') !!}
        </div>
    @endif

    <div class="row">
        <div class="col-md-7">
            {!! Form::open(['method' => 'POST', 'route' => ['count.store', $mode]]) !!}
                <color-box title="Agregar conteo en {{ auth()->user()->location->name }}" color="vks" solid>

                    @if($mode == 'normal')
                    <div class="row">
                        <div class="col-md-6">
                            <label for="product_id">Producto</label><br>
                            <v-select label="code" :options="products" v-model="product" placeholder="Seleccione un producto">
                                <template #search="{ attributes, events }">
                                  <input
                                    v-focus
                                    class="vs__search"
                                    v-bind="attributes"
                                    v-on="events"
                                  >
                                </template>
                                <template slot="option" slot-scope="option">
                                    @{{ option.code }}
                                </template>
                            </v-select>
                            <br>
                            {!! Field::number('quantity', 1, ['tpl' => 'lte/withicon', 'required' => 'true'], ['icon' => 'plus-square']) !!}
                        </div>
                        @if (auth()->user()->level == 1)
                            <div class="col-md-6">
                                {!! Field::select('location_id', $locations, auth()->user()->location_id ,['empty' => 'Seleccione ubicación', 'tpl' => 'lte/withicon'], ['icon' => 'map-pin']) !!}
                            </div>
                        @else
                            <input type="hidden" name="location_id" value="{{ auth()->user()->location_id }}">
                        @endif

                        <input type="hidden" name="product_id" :value="product.id">

                        <div class="col-md-6">
                            <h2>@{{ product.code }} <span class="label label-vks pull-right">@{{ product.quantity }} @{{ product.quantity > 1 ? 'pzas': 'pza' }}</span></h2>
                            <h4>@{{ product.description }}</h4>
                            <h4>
                                <code v-if="product.status != 'Linea'">
                                    @{{ product.status }}
                                </code>
                            </h4>
                        </div>
                    </div>

                    @else

                        <input type="hidden" name="location_id" value="{{ auth()->user()->location_id }}">
                        <input type="hidden" name="quantity" value="1">
                        {!! Field::number('product_id', ['label'=> 'Producto', 'tpl' => 'lte/withicon', 'required' => 'true', 'v-focus'], ['icon' => 'barcode']) !!}

                    @endif

                    <hr>

                    <div class="row">
                        <div class="col-md-5">
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="helper_id" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="inventory_id" value="{{ $inventory->id }}">
                            <input type="hidden" name="team" value="{{ auth()->user()->name }}">
                            @if(session('status') && $mode != 'normal')
                                <div class="alert alert-{{ session('status') == 'ARTÍCULO NO ENCONTRADO' ? 'danger': 'success'}}">
                                    {!! session('status') !!}
                                </div>
                            @endif
                        </div>

                        <div class="col-md-7">
                            <button type="submit" class="btn btn-github pull-right" onclick="submitForm(this);">GUARDAR</button>
                        </div>
                    </div>
                </color-box>

            {!! Form::close() !!}

        </div>
        <div class="col-md-5">
            <color-box color="primary" title="Últimos 5">
                <div class="row">
                    <div class="col-md-12">
                        <data-table>
                            {{ drawHeader('id', 'código', 'cantidad') }}
                            <template slot="body">
                                @foreach($counts as $count)
                                    <tr>
                                        <td>{{ $count->id }}</td>
                                        <td>{{ $count->product->code }}</td>
                                        <td>{{ $count->quantity }}</td>
                                    </tr>
                                @endforeach
                            </template>
                        </data-table>
                    </div>
                </div>
            </color-box>
        </div>
    </div>

@endsection
