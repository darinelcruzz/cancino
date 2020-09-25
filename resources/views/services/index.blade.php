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
            <color-box title="Pendientes" color="vks">
                <data-table example="1">
                    {{ drawHeader('<i class="fa fa-clock"></i>', '<i class="fa fa-cogs"></i>' ,'descripción', 'grupo', 'tienda', 'pago', 'periodo', 'próximo pago', 'vencimiento', 'estado') }}

                    <template slot="body">
                        @foreach($services as $service)
                            @if($service->status != 'PAGADO')
                            <tr>
                                <td>{{ substr(strtotime($service->expired_at), 0, 5) }}</td>
                                <td>
                                    <dropdown icon="cogs" color="github">
                                        <ddi icon="usd" to="{{ route('service_payments.create', $service) }}" text="Pagar"></ddi>
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
                            @endif
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <color-box title="Pagados" color="success" collapsed button>
                <data-table example="2">
                    {{ drawHeader('<i class="fa fa-clock"></i>', '<i class="fa fa-cogs"></i>' ,'descripción', 'grupo', 'tienda', 'pago', 'periodo', 'próximo pago', 'vencimiento') }}

                    <template slot="body">
                        @foreach($services as $service)
                            @if($service->status == 'PAGADO')
                            <tr>
                                <td>{{ substr(strtotime($service->expired_at), 0, 5) }}</td>
                                <td>
                                    <dropdown icon="cogs" color="success">
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
                            </tr>
                            @endif
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
    </div>
@endsection
