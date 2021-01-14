@extends('lte.root')
@push('pageTitle')
    Prestamos | Lista
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Me facturaron" color="danger" solid button collapsed>
                <data-table example="1">
                    {{ drawHeader('ID','Tienda', 'Modelo', 'Cantidad', 'Fecha préstamo', 'Factura') }}
                    <template slot="body">
                        @foreach($lent as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->fromr->name }}</td>
                                <td>{{ $row->item }}</td>
                                <td>{{ $row->quantity }}</td>
                                <td>{{ fdate($row->created_at, 'd/M/y') }}</td>
                                <td>{{ $row->invoice->folio ?? 'PENDIENTE' }} <br>
                                    {{ fdate($row->invoice->date ?? 0, 'd/M/y', 'Y-m-d') }}
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
            <color-box title="Facturé" color="success" solid button collapsed>
                <data-table example="2">
                    {{ drawHeader('ID','Tienda', 'Modelo', 'Cantidad', 'Fecha préstamo', 'Factura') }}
                    <template slot="body">
                        @foreach($borrowed as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->tor->name }}</td>
                                <td>{{ $row->item }}</td>
                                <td>{{ $row->quantity }}</td>
                                <td>{{ fdate($row->created_at, 'd/M/y') }}</td>
                                <td>{{ $row->invoice->folio }} <br>
                                    {{ fdate($row->invoice->date, 'd/M/y', 'Y-m-d') }}
                                </td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
    </div>
@endsection
