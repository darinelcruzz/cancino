@extends('lte.root')

@push('pageTitle', 'Insumos')

@push('headerTitle')
    <div class="row">
        <div class="col-md-8">
            <a href="{{ route('supplies.create') }}" class="btn btn-github btn-xs pull-left">
                <i class="fa fa-plus-square"></i>&nbsp;&nbsp;AGREGAR
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
            </color-box>
        </div>
        
    </div>
@endsection
