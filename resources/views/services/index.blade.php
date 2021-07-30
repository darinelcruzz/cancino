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
            <color-box title="Pendientes" color="vks" solid>
                <data-table example="11">
                    {{ drawHeader('<i class="fa fa-clock"></i>', '<i class="fa fa-cogs"></i>' ,'descripción', 'grupo', 'tienda/Casa', 'pago', 'periodo', 'próximo pago', 'vencimiento', 'estado') }}

                    <template slot="body">
                        @foreach($services as $service)
                            @if($service->status != 'pagado')
                            <tr>
                                <td>{{ substr(strtotime($service->expired_at), 0, 5) }}</td>
                                <td>
                                    <dropdown icon="cogs" color="github">
                                        <ddi icon="usd" to="{{ route('service_payments.create', $service) }}" text="Pagar"></ddi>
                                        <ddi icon="clock" to="{{ route('services.show', $service) }}" text="Historial pagos"></ddi>
                                        @if(auth()->user()->id == 2)
                                            <ddi icon="edit" to="{{ route('services.edit', $service) }}" text="Editar"></ddi>
                                        @endif
                                        @if($service->status != 'impresa')
                                            <li>
                                                <a data-toggle="modal" data-target="#service{{ $service->id }}">
                                                    <i class="fa fa-print" aria-hidden="true"></i> Marcar como impreso
                                                </a>
                                            </li>
                                        @endif
                                    </dropdown>
                                    <modal id="service{{ $service->id }}" title="Marcar como impreso">
                                        {!! Form::open(['method' => 'POST', 'route' => ['services.mark', $service]]) !!}
                                            {!! Field::date('expired_at', date('Y-m-d'), ['label' => 'Vencimiento', 'tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                                            {!! Form::submit('GUARDAR', ['class' => 'btn btn-sm btn-github pull-right']) !!}
                                        
                                        {!! Form::close() !!}
                                    </modal>
                                </td>
                                <td>{{ $service->description }}</td>
                                <td>{{ ucfirst($service->group) }}</td>
                                <td>{{ $service->serviceable->name }}</td>
                                <td>{{ fnumber($service->amount) }}</td>
                                <td>{{ $service->period_text }}</td>
                                <td>{{ fdate($service->invoiced_at, 'D, d M Y', 'Y-m-d') }}</td>
                                <td>{{ fdate($service->expired_at, 'D, d M Y', 'Y-m-d') }}</td>
                                <td><span class="label label-{{ $service->status_color }}">{{ strtoupper($service->status) }}</span></td>
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
            <color-box title="Pagados" color="success" collapsed button solid>
                <data-table example="12">
                    {{ drawHeader('<i class="fa fa-clock"></i>', '<i class="fa fa-cogs"></i>' ,'descripción', 'grupo', 'tienda', 'pago', 'periodo', 'próximo pago', 'vencimiento', 'estado') }}

                    <template slot="body">
                        @foreach($services as $service)
                            @if($service->status == 'pagado')
                            <tr>
                                <td>{{ substr(strtotime($service->expired_at), 0, 5) }}</td>
                                <td>
                                    <dropdown icon="cogs" color="success">
                                        <ddi icon="clock" to="{{ route('services.show', $service) }}" text="Historial pagos"></ddi>
                                        @if(auth()->user()->id == 2)
                                            <ddi icon="edit" to="{{ route('services.edit', $service) }}" text="Editar"></ddi>
                                        @endif
                                    </dropdown>
                                </td>
                                <td>{{ $service->description }}</td>
                                <td>{{ ucfirst($service->group) }}</td>
                                <td>{{ $service->serviceable->name }}</td>
                                <td>{{ fnumber($service->amount) }}</td>
                                <td>{{ $service->period_text }}</td>
                                <td>{{ fdate($service->invoiced_at, 'D, d M Y', 'Y-m-d') }}</td>
                                <td>{{ fdate($service->expired_at, 'D, d M Y', 'Y-m-d') }}</td>
                                <td><span class="label label-{{ $service->status_color }}">{{ strtoupper($service->status) }}</span></td>
                            </tr>
                            @endif
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
    </div>
@endsection
