@extends('lte.root')
@push('pageTitle')
    Prestamos | Lista
@endpush

@push('headerTitle')
    <h2>{{ $store->name }}</h2>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Debe {{ count($lent) }}" color="danger" solid button collapsed>
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
                                        <span class="label label-success">
                                            {{ ucfirst($row->status) }}
                                        </span>
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
            <color-box title="Le deben {{ count($borrowed) }}" color="success" solid button collapsed>
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
                                        <span class="label label-danger">
                                            {{ ucfirst($row->status) }}
                                        </span>
                                    @elseif ($row->status == 'aceptado')
                                        <span class="label label-success">
                                            {{ ucfirst($row->status) }}
                                        </span>
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
            <color-box title="Facturó {{ count($invoiced) }}" color="info" solid button>
                <data-table example="3">
                    {{ drawHeader('ID', 'Fecha', 'Factura', 'Tienda', 'Importe', 'POS', '<i class="fa fa-eye"></i>') }}
                    <template slot="body">
                        @foreach($invoiced as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ fdate($row->date, 'd-M-y', 'Y-m-d') }}</td>
                                <td>{{ $row->folio }}</td>
                                <td>{{ $row->tor->name }}</td>
                                <td>{{ fnumber($row->amount) }}</td>
                                <td>{{ $row->pos }} <br> {{ fdate($row->pos_at, 'd-M-y', 'Y-m-d') }}</td>
                                <td>
                                    <a href="{{ route('invoices.show', ['id' => $row->id])}}" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
                                    @if (auth()->user()->level == 1)
                                        <a href="{{ route('invoices.pay', ['id' => $row->id])}}" class="btn btn-xs btn-primary"><i class="fa fa-dollar"></i></a>
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
            <color-box title="Pagadas {{ count($payed) }}" color="primary" solid button collapsed>
                <data-table example="4">
                    {{ drawHeader('ID', 'Fecha', 'Factura', 'Tienda', 'Importe', 'POS', 'Pago', '<i class="fa fa-eye"></i>') }}
                    <template slot="body">
                        @foreach($payed as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ fdate($row->date, 'd-M-y', 'Y-m-d') }}</td>
                                <td>{{ $row->folio }}</td>
                                <td>{{ $row->tor->name }}</td>
                                <td>{{ fnumber($row->amount) }}</td>
                                <td>{{ $row->pos }} <br> {{ fdate($row->pos_at, 'd-M-y', 'Y-m-d') }}</td>
                                <td>{{ fdate($row->payed_at, 'd-M-y', 'Y-m-d') }} </td>
                                <td><a href="{{ route('invoices.show', ['id' => $row->id])}}" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a></td>
                            </tr>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
    </div>
@endsection
