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

            <color-box title="Agregar conteo" color="primary" solid>


                    <div class="row">
                        <div class="col-md-6">
                            <label for="product_id">Producto</label><br>
                            <v-select label="code" :options="products" v-model="product" placeholder="Seleccione un producto">
                                <template slot="option" slot-scope="option">
                                    @{{ option.code }}
                                </template>
                            </v-select>
                            <br>
                            {!! Field::number('quantity', ['tpl' => 'lte/withicon', 'required' => 'true'], ['icon' => 'plus-square']) !!}
                        </div>

                        <div class="col-md-6">
                            <h2>@{{ product.code }}</h2>
                            <h4>@{{ product.description }}</h4>
                            <h4>
                                <code v-if="product.status == 'Descontinuado'">
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
                            <input type="hidden" name="location_id" value="{{ auth()->user()->location_id }}">
                            <input type="hidden" name="product_id" :value="product.id">

                            {!! Form::submit('Siguiente', ['class' => 'btn btn-primary pull-right']) !!}
                        </div>
                    </div>

            </color-box>

            {!! Form::close() !!}

        </div>
    </div>

@endsection
