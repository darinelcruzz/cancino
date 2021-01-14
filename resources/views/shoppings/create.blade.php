@extends('lte.root')

@push('pageTitle')
    Compras | Agregar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-6">
            <color-box title="Agregar compra" color="vks" solid>
                {!! Form::open(['method' => 'POST', 'route' => 'shoppings.store']) !!}

                    <div class="row">
                        @if(auth()->user()->level > 2)
                            <div class="col-md-6">
                                {!! Field::select('store_id', $storesArray, auth()->user()->store_id,
                                    ['empty' => 'Seleccione tienda', 'tpl' => 'lte/withicon', 'disabled'], ['icon' => 'store'])
                                !!}
                            </div>
                            <input type="hidden" name="store_id" value="{{ auth()->user()->store_id }}">
                        @else
                            <div class="col-md-6">
                                {!! Field::select('store_id', $storesArray, null,
                                    ['empty' => 'Seleccione tienda', 'tpl' => 'lte/withicon'], ['icon' => 'store'])
                                !!}
                            </div>
                        @endif
                        <div class="col-md-6">
                            {!! Field::date('date', date('Y-m-d'), ['tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                        </div>
                    </div>

                    <button class="btn btn-github btn-xs" type="button" v-on:click="items.push({id: items.length})">
                        <i class="fa fa-plus"></i>
                    </button>

                    <div v-if="items.length > 0" class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th><i class="fa fa-times"></i></th>
                                        <th>Folio</th>
                                        <th>Monto</th>
                                        <th>Tipo</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr v-for="(item, index) in items" :key="item.id">
                                        <td>
                                            <a v-on:click="items.splice(index, 1)" style="color: red;">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" :name="'items[' + index + '][folio]'" class="form-control" placeholder="XXX0X0X">
                                            </div>                                            
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="number" class="form-control" :name="'items[' + index + '][amount]'" step="0.01" min="0.01" value="0">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <select class="form-control" :name="'items[' + index + '][type]'">
                                                    <option value="no definido">No definido</option>
                                                    <option value="regalias">Regalías</option>
                                                    <option value="nota cargo">Nota cargo</option>
                                                    <option value="comision">Comisión</option>
                                                    <option value="carrito">Carrito</option>
                                                    <option value="pronto pago">Pronto pago</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <hr>
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="status" value="pendiente">
                    <button type="submit" class="btn btn-github pull-right" onclick="submitForm(this);">Agregar</button>

                {!! Form::close() !!}
            </color-box>
        </div>
    </div>

@endsection
