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
            <color-box title="Debe" color="danger" solid button collapsed>
                <data-table example="1">
                    {{ drawHeader('ID','Tienda', 'Modelo', 'Cantidad', 'Fecha', 'Estado') }}
                    <template slot="body">
                        @foreach($lent as $row)
                            @if ($row->status != 'facturado' && $row->status != 'pagado')
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->fromr->name }}</td>
                                    <td>
                                        @if ($row->status != 'solicitado' && $row->status != 'aceptado')
                                            <a href="{{ route('loans.show', ['id' => $row->id]) }}">{{ $row->item }}</a>
                                        @else
                                            {{ $row->item }}
                                        @endif
                                    </td>
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
                                        @elseif ($row->status == 'devuelto')
                                            <span class="label label-primary">
                                                {{ ucfirst($row->status) }}
                                            </span>
                                        @elseif ($row->status == 'parcialmente')
                                            <span class="label label-warning">
                                                {{ ucfirst($row->status) }}
                                            </span>
                                        @elseif ($row->status == 'pagado')
                                            <span class="label label-success">
                                                {{ ucfirst($row->status) }}
                                            </span>
                                        @elseif ($row->status == 'facturado')
                                            <span class="label label-warning">
                                                {{ ucfirst($row->status) }}
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <color-box title="Le deben" color="success" solid button collapsed>
                <data-table example="2">
                    {{ drawHeader('ID','Tienda', 'Modelo', 'Cantidad', 'Fecha', 'Estado') }}
                    <template slot="body">
                        @foreach($borrowed as $row)
                            @if ($row->status != 'facturado' && $row->status != 'pagado')
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->tor->name }}</td>
                                    <td><a href="{{ route('loans.show', ['id' => $row->id]) }}">{{ $row->item }}</a></td>
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
                                        @elseif ($row->status == 'devuelto')
                                            <span class="label label-primary">
                                                {{ ucfirst($row->status) }}
                                            </span>
                                        @elseif ($row->status == 'parcialmente')
                                            <span class="label label-warning">
                                                {{ ucfirst($row->status) }}
                                            </span>
                                        @elseif ($row->status == 'pagado')
                                            <span class="label label-success">
                                                {{ ucfirst($row->status) }}
                                            </span>
                                        @elseif ($row->status == 'facturado')
                                            <span class="label label-warning">
                                                {{ ucfirst($row->status) }}
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <color-box title="Facturó" color="info" solid button>
                <data-table example="3">
                    {{ drawHeader('ID', 'Factura','Tienda', 'Modelo', 'Cantidad', 'Fecha', 'Estado') }}
                    <template slot="body">
                        @foreach($borrowed as $row)
                            @if ($row->status == 'facturado')
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->invoice }}</td>
                                    <td>{{ $row->tor->name }}</td>
                                    <td><a href="{{ route('loans.show', ['id' => $row->id]) }}">{{ $row->item }}</a></td>
                                    <td>{{ $row->quantity - $row->q1 - $row->q2 - $row->q3 }}</td>
                                    <td>{{ fdate($row->created_at, 'd/M/y') }}</td>
                                    <td>
                                        ¿Pagado?&nbsp;
                                        <a href="{{ route('loans.agree', ['id' => $row->id])}}" class="btn btn-xs btn-success"><i class="fa fa-check"></i></a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <color-box title="Le pagaron" color="primary" solid button collapsed>
                <data-table example="4">
                    {{ drawHeader('ID', 'Factura','Tienda', 'Modelo', 'Cantidad', 'Pago') }}
                    <template slot="body">
                        @foreach($borrowed as $row)
                            @if ($row->status == 'pagado')
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td><a href="{{ route('loans.details', ['id' => $row->id]) }}">{{ $row->invoice }}</a></td>
                                    <td>{{ $row->tor->name }}</td>
                                    <td><a href="{{ route('loans.show', ['id' => $row->id]) }}">{{ $row->item }}</a></td>
                                    <td>{{ $row->quantity - $row->q1 - $row->q2 - $row->q3 }}</td>
                                    <td>{{ fdate($row->updated_at, 'd/M/y') }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
    </div>
@endsection
