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
                        @if(!isVks())
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

                    <button class="btn btn-github btn-xs" type="button" v-on:click="items.push({id: items.length, type: 'no definido', amount: 0})">
                        <i class="fa fa-plus"></i>
                    </button>

                    <div v-if="items.length > 0" class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th><i class="fa fa-times"></i></th>
                                        <th>Folio</th>
                                        <th>Tipo</th>
                                        <th>Monto</th>
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
                                                <select class="form-control" :name="'items[' + index + '][type]'" v-model="item.type">
                                                    <option value="no definido">No definido</option>
                                                    <option value="regalias">Regalías</option>
                                                    <option value="nota cargo">Nota cargo</option>
                                                    <option value="comision">Comisión</option>
                                                    <option value="carrito">Carrito</option>
                                                    <option value="pronto pago">Pronto pago</option>
                                                    <option value="promocion de ventas">Promoción de ventas</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="number" class="form-control" v-model.number="item.amount" :name="'items[' + index + '][amount]'" step="0.01" min="0.01" value="0">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><i class="fa fa-note"></i></td>
                                        <td>Notas crédito (-)</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="number" class="form-control" step="0.01" min="0.01" v-model.number="public_amount">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th style="text-align: right;" colspan="3"><em>TOTAL</em></th>
                                        <td>@{{ (items.reduce((total, item) => total + (item.type == 'no definido' || item.type == 'regalias' || item.type == 'nota cargo' || item.type == 'comision' ? item.amount: -item.amount), 0) - public_amount).toFixed(2) }}</td>
                                    </tr>
                                </tfoot>
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
