@extends('lte.root')

@push('pageTitle', 'Conteos')

@section('content')

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">

        <div class="col-md-8">

            {!! Form::open(['method' => 'POST', 'route' => 'count.store']) !!}

            <color-box title="Agregar conteo en {{ auth()->user()->location->name }}" color="vks" solid>
                <div class="row">
                    <div class="col-md-6">
                        <label for="product_id">Producto</label><br>
                        <v-select label="barcode" :options="products" v-model="product" placeholder="Seleccione un producto" autofocus>
                            <template slot="option" slot-scope="option">
                                @{{ option.barcode }}
                            </template>
                        </v-select>
                        <br>
                        {!! Field::number('quantity', 1, ['tpl' => 'lte/withicon', 'required' => 'true'], ['icon' => 'plus-square']) !!}
                    </div>
                    @if (auth()->user()->level ==1)
                        <div class="col-md-6">
                            {!! Field::select('location_id', $locations, auth()->user()->location_id ,['empty' => 'Seleccione ubicación', 'tpl' => 'lte/withicon'], ['icon' => 'map-pin']) !!}
                        </div>
                    @else
                        <input type="hidden" name="location_id" value="{{ auth()->user()->location_id }}">
                    @endif

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

                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="helper_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="team" value="{{ auth()->user()->name }}">
                        <input type="hidden" name="product_id" :value="product.id">

                        <button type="submit" class="btn btn-github pull-right" onclick="submitForm(this);">Siguiente</button>
                    </div>
                </div>
            </color-box>

            {!! Form::close() !!}

        </div>
    </div>

@endsection
