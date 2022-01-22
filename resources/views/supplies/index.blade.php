@extends('lte.root')

@push('pageTitle', 'Insumos')

@push('headerTitle')
    <div class="row">
        <div class="col-md-7">
            <a href="{{ route('supplies.create') }}" class="btn btn-github btn-xs pull-left">
                <i class="fa fa-plus-square"></i>&nbsp;&nbsp;AGREGAR
            </a>
        </div>
        <div class="col-md-1">
            <a href="{{ route('supplies.inventory') }}" class="btn btn-github btn-sm pull-right" target="_blank">
                <i class="fa fa-file-alt"></i>
            </a>
        </div>
        <div class="col-md-4">
            {!! Form::open(['method' => 'POST', 'route' => 'supplies.print']) !!}
              <div class="input-group input-group-sm">
                  <input type="date" name="date" class="form-control" required>
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-github btn-flat btn-xs">
                        <i class="fa fa-print"></i>
                    </button>
                  </span>
              </div>
            {!! Form::close() !!}
        </div>
    </div>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Insumos" color="vks">

                <div class="table-responsive">
                    <table id="example1" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th><i class="fa fa-cogs"></i></th>
                            <th>Descripción</th>
                            <th>Clave SAT</th>
                            <th>Tuxtla</th>
                            <th>Tapachula</th>
                            <th>Comprados</th>
                            <th>Vendidos</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($supplies as $supply)
                            <tr>
                                <td>{{ $supply->id }}</td>
                                <td>
                                    <dropdown icon="cogs" color="github">
                                        <ddi icon="eye" to="{{ route('supplies.show', $supply) }}" text="Ver"></ddi>
                                        <ddi icon="edit" to="{{ route('supplies.edit', $supply) }}" text="Editar"></ddi>
                                    </dropdown>
                                </td>
                                <td>
                                    {{ $supply->description }}<br>
                                    <code>{{ $supply->code ?? 'TEST' }}</code><span style="color: purple">{{ $supply->sat_key }}</span>
                                </td>
                                <td>{{ $supply->sat_key }}</td>
                                @foreach($supply->stocks as $stock)
                                    <td>{{ $stock->quantity }} {{ $supply->unit . ($stock->quantity != 1 ? 's': '') }}</td>
                                @endforeach
                                {{-- <td>{{ number_format($supply->purchase_price, 2) }}</td>
                                <td>{{ number_format($supply->sale_price, 2) }}</td> --}}
                                <td>{{ $supply->total_purchased }}</td>
                                <td>{{ $supply->total_sold }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </color-box>
        </div>
        <div class="col-md-8">
            <color-box title="Insumos precios bajos" color="danger" button collapsed label="{{ $low_prices->count() }}">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descripción</th>
                            <th>Compra</th>
                            <th>Venta</th>
                            <th>Sugerido</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($low_prices as $supply)
                            <tr>
                                <td>{{ $supply->id }}</td>
                                <td>
                                    {{ $supply->description }}<br>
                                    <code>{{ $supply->code }}</code><span style="color: purple"> {{ $supply->sat_key }}</span>
                                </td>
                                <td>{{ fnumber($supply->purchase_price, 2) }}</td>
                                <td>{{ fnumber($supply->sale_price, 2) }}</td>
                                <td>
                                    {{ fnumber($supply->purchase_price * 1.25, 2) }}
                                    <a href="{{ route('supplies.edit', $supply) }}" class="btn btn-github btn-sm pull-right" target="_blank">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </color-box>
        </div>

    </div>
@endsection
