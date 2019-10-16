@extends('lte.root')
@push('pageTitle')
    Prestamos | Lista
@endpush

@push('headerTitle')
    <a href="{{ route('loans.create') }}" class="btn btn-danger btn"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Agregar</a><br>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Debo  {{ count($lent) }}" color="danger" solid button>
                <data-table example="1">
                    {{ drawHeader('ID','Tienda', 'Modelo', 'Cantidad', 'Fecha', 'Estado') }}
                    <template slot="body">
                        @foreach($lent as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->fromr->name }}</td>
                                <td>{{ $row->item }}</td>
                                <td>{{ $row->quantity }}</td>
                                <td>{{ fdate($row->created_at, 'd/M/y') }}</td>
                                <td>
                                    @if ($row->status == 'solicitado')
                                        <span class="label label-danger">
                                            {{ ucfirst($row->status) }}
                                        </span>
                                    @elseif ($row->status == 'aceptado')
                                        ¿Lo recibiste?&nbsp;
                                        <a href="{{ route('loans.agree', ['id' => $row->id])}}" class="btn btn-xs btn-success"><i class="fa fa-check"></i></a>
                                    @elseif ($row->status == 'recibido')
                                        <span class="label label-info">
                                            {{ ucfirst($row->status) }}
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <color-box title="Me deben  {{ count($borrowed) }}" color="success" solid button>
                <data-table example="2">
                    {{ drawHeader('ID','Tienda', 'Modelo', 'Cantidad', 'Fecha', 'Estado') }}
                    <template slot="body">
                        @foreach($borrowed as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->tor->name }}</td>
                                <td>{{ $row->item }}</td>
                                <td>{{ $row->quantity }}</td>
                                <td>{{ fdate($row->created_at, 'd/M/y') }}</td>
                                <td>
                                    @if ($row->status == 'solicitado')
                                        ¿Aceptas?&nbsp;
                                        <a href="{{ route('loans.agree', ['id' => $row->id])}}" class="btn btn-xs btn-success"><i class="fa fa-check"></i></a>
                                    @elseif ($row->status == 'aceptado')
                                        <span class="label label-success">
                                            {{ ucfirst($row->status) }}
                                        </span>
                                    @elseif ($row->status == 'recibido')
                                        ¿Facturar?&nbsp;
                                        <a href="{{ route('invoices.create', ['store_id' => $row->to])}}" class="btn btn-xs btn-success"><i class="fa fa-check"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <color-box title="Facturé" color="info" solid button collapsed>
                <data-table example="3">
                    {{ drawHeader('ID', 'Fecha', 'Factura', 'Tienda', 'Importe', 'POS', '<i class="fa fa-eye"></i>') }}
                    <template slot="body">
                        @foreach($invoiceBorrowed as $row)
                            @if ($row->status == 'pendiente')
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ fdate($row->date, 'd-M-y', 'Y-m-d') }}</td>
                                    <td>{{ $row->folio }}</td>
                                    <td>{{ $row->tor->name }}</td>
                                    <td>{{ fnumber($row->amount) }}</td>
                                    <td>{{ $row->pos }} <br> {{ fdate($row->pos_at, 'd-M-y', 'Y-m-d') }}</td>
                                    <td><a href="{{ route('invoices.show', ['id' => $row->id])}}" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a></td>
                                </tr>
                            @endif
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
        <div class="col-md-6">
            <color-box title="Me facturaron" color="info" solid button collapsed>
                <data-table example="4">
                    {{ drawHeader('ID', 'Fecha', 'Factura', 'Tienda', 'Importe', 'POS', '<i class="fa fa-eye"></i>') }}
                    <template slot="body">
                        @foreach($invoiceLent as $row)
                            @if ($row->status == 'pendiente')
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ fdate($row->date, 'd-M-y', 'Y-m-d') }}</td>
                                    <td>{{ $row->folio }}</td>
                                    <td>{{ $row->fromr->name }}</td>
                                    <td>{{ fnumber($row->amount) }}</td>
                                    <td>{{ $row->pos }} <br> {{ fdate($row->pos_at, 'd-M-y', 'Y-m-d') }}</td>
                                    <td><a href="{{ route('invoices.show', ['id' => $row->id])}}" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a></td>
                                </tr>
                            @endif
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <color-box title="Me pagaron" color="primary" solid button collapsed>
                <data-table example="5">
                    {{ drawHeader('ID', 'Fecha', 'Factura', 'Tienda', 'Importe', 'POS', 'Pago', '<i class="fa fa-eye"></i>') }}
                    <template slot="body">
                        @foreach($invoiceBorrowed as $row)
                            @if ($row->status == 'pagada')
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ fdate($row->date, 'd-M-y', 'Y-m-d') }}</td>
                                    <td>{{ $row->folio }}</td>
                                    <td>{{ $row->tor->name }}</td>
                                    <td>{{ fnumber($row->amount) }}</td>
                                    <td>{{ $row->pos }} <br> {{ fdate($row->pos_at, 'd-M-y', 'Y-m-d') }}</td>
                                    <td>{{ fdate($row->payed_at, 'd-M-y', 'Y-m-d') }}</td>
                                    <td><a href="{{ route('invoices.show', ['id' => $row->id])}}" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a></td>
                                </tr>
                            @endif
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
        <div class="col-md-6">
            <color-box title="Pagué" color="primary" solid button collapsed>
                <data-table example="6">
                    {{ drawHeader('ID', 'Fecha', 'Factura', 'Tienda', 'Importe', 'POS', 'Pago', '<i class="fa fa-eye"></i>') }}
                    <template slot="body">
                        @foreach($invoiceLent as $row)
                            @if ($row->status == 'pagada')
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ fdate($row->date, 'd-M-y', 'Y-m-d') }}</td>
                                    <td>{{ $row->folio }}</td>
                                    <td>{{ $row->fromr->name }}</td>
                                    <td>{{ fnumber($row->amount) }}</td>
                                    <td>{{ $row->pos }} <br> {{ fdate($row->pos_at, 'd-M-y', 'Y-m-d') }}</td>
                                    <td>{{ fdate($row->payed_at, 'd-M-y', 'Y-m-d') }}</td>
                                    <td><a href="{{ route('invoices.show', ['id' => $row->id])}}" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a></td>
                                </tr>
                            @endif
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
    </div>
@endsection
