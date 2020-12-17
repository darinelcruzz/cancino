@extends('lte.root')

@push('pageTitle', 'Insumos | Ventas')

@push('headerTitle')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('supplies.transfers.create') }}" class="btn btn-github btn-xs pull-left">
                <i class="fa fa-plus-square"></i>&nbsp;&nbsp;AGREGAR
            </a>
        </div>
    </div>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Transferencias" color="vks" solid>

                <table id="example1" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th><i class="fa fa-cogs"></i></th>
                            <th>Fecha</th>
                            <th>Origen</th>
                            <th>Destino</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($transfers as $transfer)
                            <tr>
                                <td>{{ $transfer->id }}</td>
                                <td>
                                    <dropdown icon="cogs" color="github">
                                        <ddi icon="eye" to="{{ route('supplies.transfers.show', $transfer) }}" text="Ver"></ddi>
                                        {{-- <ddi icon="edit" to="{{ route('supplies.transfers.edit', $transfer) }}" text="Editar"></ddi> --}}
                                    </dropdown>
                                </td>
                                <td>{{ $transfer->transferred_at }}</td>
                                <td>{{ $transfer->origin->name }}</td>
                                <td>{{ $transfer->destination->name }}</td>
                                <td>{{ $transfer->movements->sum('quantity') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </color-box>
        </div>
        
    </div>
@endsection
