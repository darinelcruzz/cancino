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
            <color-box title="Debo" color="danger" solid button>
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
                                            ¿Lo recibiste?&nbsp;
                                            <a href="{{ route('loans.agree', ['id' => $row->id])}}" class="btn btn-xs btn-success"><i class="fa fa-check"></i></a>
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
            <color-box title="Me deben" color="success" solid button>
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
                                            ¿Aceptas?&nbsp;
                                            <a href="{{ route('loans.agree', ['id' => $row->id])}}" class="btn btn-xs btn-success"><i class="fa fa-check"></i></a>
                                        @elseif ($row->status == 'aceptado')
                                            <span class="label label-success">
                                                {{ ucfirst($row->status) }}
                                            </span>
                                        @elseif ($row->status == 'recibido')
                                            <span class="label label-info">
                                                {{ ucfirst($row->status) }}
                                            </span>
                                        @elseif ($row->status == 'devuelto')
                                            ¿Aceptas {{ $row->lastQ }}?&nbsp;
                                            <a href="{{ route('loans.agree', ['id' => $row->id])}}" class="btn btn-xs btn-success"><i class="fa fa-check"></i></a>
                                        @elseif ($row->status == 'parcialmente')
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
        <div class="col-md-6">
            <color-box title="Facturé" color="info" solid button collapsed>
                <data-table example="3">
                    {{ drawHeader('ID', 'Factura','Tienda', 'Modelo', 'Cantidad', 'Fecha') }}
                    <template slot="body">
                        @foreach($borrowed as $row)
                            @if ($row->status == 'facturado')
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td><a href="{{ route('loans.details', ['id' => $row->id]) }}">{{ $row->invoice }}</a></td>
                                    <td>{{ $row->tor->name }}</td>
                                    <td><a href="{{ route('loans.show', ['id' => $row->id]) }}">{{ $row->item }}</a></td>
                                    <td>{{ $row->quantity - $row->q1 - $row->q2 - $row->q3 }}</td>
                                    <td>{{ fdate($row->invoice_date, 'd/M/y', 'Y-m-d') }}</td>
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
                    {{ drawHeader('ID', 'Factura','Tienda', 'Modelo', 'Cantidad', 'Fecha') }}
                    <template slot="body">
                        @foreach($lent as $row)
                            @if ($row->status == 'facturado')
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td><a href="{{ route('loans.details', ['id' => $row->id]) }}">{{ $row->invoice }}</a></td>
                                    <td>{{ $row->fromr->name }}</td>
                                    <td><a href="{{ route('loans.show', ['id' => $row->id]) }}">{{ $row->item }}</a></td>
                                    <td>{{ $row->quantity - $row->q1 - $row->q2 - $row->q3 }}</td>
                                    <td>{{ fdate($row->invoice_date, 'd/M/y', 'Y-m-d') }}</td>
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
                    {{ drawHeader('ID' ,'Factura','Tienda', 'Modelo', 'Cantidad', 'Pago') }}
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
        <div class="col-md-6">
            <color-box title="Pagué" color="primary" solid button collapsed>
                <data-table example="6">
                    {{ drawHeader('ID', 'Factura','Tienda', 'Modelo', 'Cantidad', 'Pago') }}
                    <template slot="body">
                        @foreach($lent as $row)
                            @if ($row->status == 'pagado')
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td><a href="{{ route('loans.details', ['id' => $row->id]) }}">{{ $row->invoice }}</a></td>
                                    <td>{{ $row->fromr->name }}</td>
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
