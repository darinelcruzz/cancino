@extends('lte.root')

@push('pageTitle', 'Pagos | Lista')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <color-box title="Lista de pagos" color="vks">
                <data-table example="1">
                    {{ drawHeader('ID', '<i class="fa fa-cogs"></i>' ,'fecha', 'servicio', 'tienda', 'monto', 'método') }}

                    <template slot="body">
                        @foreach($payments as $payment)
                            <tr>
                                <td>{{ $payment->id }}</td>
                                <td>
                                    <dropdown icon="cogs" color="github">
                                        
                                    </dropdown>
                                </td>
                                <td>{{ fdate($payment->paid_at, 'D, d M Y', 'Y-m-d') }}</td>
                                <td>{{ ucfirst($payment->service->description) }}</td>
                                <td>{{ $payment->service->serviceable->name }}</td>
                                <td>{{ fnumber($payment->amount) }}</td>
                                <td><small>{{ strtoupper($payment->method) }}</small></td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
    </div>
@endsection
