@extends('lte.root')
@push('pageTitle')
    Prestamos | Factura
@endpush

@section('content')
    <div class="row">
        <div class="col-md-6">
            <color-box title="Factura {{ $info }}" color="info" solid>
                <data-table example="1">
                    {{ drawHeader('Modelo', 'Cantidad', 'Status') }}
                    <template slot="body">
                        @foreach($invoice as $row)
                            <tr>
                                <td>{{ $row->item }}</td>
                                <td>{{ $row->quantity - $row->q1 - $row->q2 - $row->q3 }}</td>
                                <td>
                                    @if ($row->status == 'pagado')
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
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
    </div>

@endsection
