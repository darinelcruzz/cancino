@extends('lte.root')

@push('pageTitle', 'Servicios | Lista')

@push('headerTitle')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('services.create') }}" class="btn btn-github btn-xs pull-left">
                <i class="fa fa-plus-square"></i>&nbsp;&nbsp;AGREGAR
            </a>
        </div>
    </div>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Lista de servicios" color="vks">
                <data-table example="1">
                    {{ drawHeader('ID', '<i class="fa fa-cogs"></i>' ,'description', 'grupo', 'tienda', 'pago', 'periodo', 'próximo pago', 'vencimiento', 'estado') }}

                    <template slot="body">
                        @foreach($services as $service)
                            <tr>
                                <td>{{ $service->id }}</td>
                                <td>
                                    <dropdown icon="cogs" color="github">
                                        @if($service->status != 'PAGADO')
                                        <ddi icon="usd" to="{{ route('service_payments.create', $service) }}" text="Pagar"></ddi>
                                        @endif
                                        <ddi icon="clock" to="{{ route('services.show', $service) }}" text="Historial pagos"></ddi>
                                    </dropdown>
                                </td>
                                <td>{{ $service->description }}</td>
                                <td>{{ ucfirst($service->group) }}</td>
                                <td>{{ $service->serviceable->name }}</td>
                                <td>{{ fnumber($service->amount) }}</td>
                                <td>{{ $service->period_text }}</td>
                                <td>{{ fdate($service->invoiced_at, 'D, d M Y', 'Y-m-d') }}</td>
                                <td>{{ fdate($service->expired_at, 'D, d M Y', 'Y-m-d') }}</td>
                                <td><span class="label label-{{ $service->status_color }}">{{ $service->status }}</span></td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
    </div>
@endsection
